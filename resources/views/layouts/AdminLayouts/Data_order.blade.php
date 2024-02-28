<!---Data_Order.blade-->
@extends('admin.Orders')
@section('Orders')
<div class="tool_bar">
    <p class="tool_btn">
        waiting of delivery
    </p>
    <p class="tool_btn">
        currently shipping
    </p>
    <p class="tool_btn">
        successfully
    </p>
    <p class="tool_btn">
        cancel shipping
    </p>
</div>
<h1 style="text-decoration: underline;margin: 10px; ">waiting of delivery</h1>
<div class="table-data">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">address</th>
                <th scope="col">product</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>aamdo</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection