<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use App\Models\CancelledOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $tables = Table::paginate(10);
        $menus = Menu::all();
        return view("waiter-dashboard.order",compact("menus","tables"));
    }
    public function show(){
        $orders = Order::paginate(10);
        return view('chef-dashboard.manage-orders',compact('orders'));
    }
    public function store(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'table_number' => 'required',
        ]);

        $menu = Menu::find($id);
        $itemPrice = $menu->price * $request->quantity;
        $Itemname = $menu->name;


        $order = new Order();
        $order->name = $Itemname;
        $order->quantity = $request->quantity;
        $order->price =  $itemPrice;
        $order->table_number = $request->table_number;

        if($order->save()){
            return redirect(route('add-order'))->with('success','Ordererd succcessfully');
        }
        return redirect(route('add-order'))->with('error','Something Went Wrong...!');
    }

    public function delete(Request $request,$id){
        $order = Order::find($id);
        $cancelledOrder = new CancelledOrder();
        if($order){
            $cancelledOrder->name = $order->name;
            $cancelledOrder->quantity = $order->quantity;
            $cancelledOrder->price = $order->price;
            $cancelledOrder->table_number = $order->table_number;

            if($cancelledOrder->save()){
                $order->delete();
                return redirect()->back()->with('success', 'Order cancelled successfully');
            }
        }
        return redirect()->back()->with('error', 'Order not found');
    }

    public function bill(Request $request){
         $bills = DB::table('orders')
         ->select('table_number',DB::raw('SUM(price) as total_amount'))
         ->groupBy('table_number')
         ->get();

         return view('cashier-dashboard.billing-payments',compact('bills'));
        
    }
    public function generateBill($table_number)
    {
        // Get all pending/completed orders for the table
        $orders = Order::where('table_number', $table_number)
                    ->get();

        // Calculate total bill
        $total = $orders->sum('price');

        return view('cashier-dashboard.billing', compact('orders', 'total', 'table_number'));
    }


public function complete(Request $request,$table_number,$total){
    $completedorder = new CompletedOrder();
    $order = Order::where('table_number',$table_number);
    $completedorder->table_number = $table_number;
    $completedorder->price = $total;

    if($completedorder->save()){
                $order->delete();
                return redirect()->route('bill');
            }
        return redirect()->back()->with('error', 'Something Went Wrong...!');

    }

         public function viewReport()
    {
        $monthlyReport = DB::table('completed_orders')
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                DB::raw("COUNT(*) as total_orders"),
                DB::raw("SUM(price) as total_sales")
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->paginate(10);
            // ->get()
            

        return view('admin-dashboard.report', compact('monthlyReport'));
    }
}