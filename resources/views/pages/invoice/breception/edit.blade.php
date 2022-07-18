@extends('layouts.master')

@section('title','Personnels')


@section('css')

@endsection
@section('content')

@section('javascript')
<script>
    $(document).ready(function() {
        var counter = <?php echo count($data['invoice_items']); ?>;
        counter++;
        $("#addrow").on("click", function() {
            //alert("str");
            var newRow = $("<tr>");
            var cols = "";
            cols += `<td>
            <select class="form-control form-select" name="row[` + counter + `][product]" id="situation_familialev" required>
                                            @isset($data['products'])
                                                    @foreach($data['products'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}} </option>
                                                    @endforeach
                                            @endisset
             </select>
            </td>`;
            cols += `<td>
            <select class="form-control form-select" name="row[` + counter + `][unit]" id="situation_familialev" required>
                                            @isset($data['unit'])
                                                    @foreach($data['unit'] as $item)
                                                        <option value="{{$item->id}}">{{$item->symbol}} </option>
                                                    @endforeach
                                            @endisset
            </select>
            </td>`;

            cols += '<td><input type="number" id="quantite" class="form-control"  name="row[' + counter + '][quantite]" value="0""/></td>';
            cols += '<td><input type="number" class="form-control" id="prix" name="row[' + counter + '][prix]" value="0""/></td>';
            cols += '<td><input type="number" class="form-control" id="total" name="row[' + counter + '][total]" value="0""/></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);

            $("table.order-list").append(newRow);
            counter++;

            $("#prix").change(function() {
                var str = $("#quantite").val() * $("#prix").val();
                $("#total").val(str);
                ///var price = +row.find('input[id="prix"]').val();
                //alert(str); 
            });


            var grandTotal = 0;
            $("table.order-list").find('input[id="total"]').each(function() {
                grandTotal += +$(this).val();

            });

            $("#grandtotal").text(grandTotal.toFixed(2));
            $("#totalglobal").val(grandTotal.toFixed(2));

        });
        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
            counter -= 1
        });
    });

    function calculateRow(row) {
        var price = +row.find('input[name^="prix"]').val();
    }
</script>

@endsection


<div class="nk-content-body">
    <form id="" method="post" action="{{route('breception.update',$data['invoice']->id)}}" autocomplete="off" enctype="multipart/form-data">
        @csrf()
        @method('PUT')
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Modifier un Récéption de commande</h3>
                    <div class="nk-block-des text-soft">
                        <!-- <p>Vous avez un total de 2 595 Personnels.</p> -->
                    </div>
                </div>
                <!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class=" nk-block">
                        <button type="submit" class=" btn btn-icon btn-primary"><em class="icon ni ni-save"></em></button>
                    </div><!-- .toggle-wrap -->
                </div>
                <!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="">
                <div class="container">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="situation_familiale">Fournisseur </label>
                                        <div class="form-control-wrap">
                                            <select class="form-control form-select" name="fournisseur" id="situation_familialev" required>
                                                <option value="{{$data['invoice']->account_id}}">{{$data['invoice']->account->name}} </option>
                                                @isset($data['account'])
                                                @foreach($data['account'] as $item)
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="date_debut">Date
                                        </label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-wrap">
                                                <input type="date" value="<?php echo date('Y-m-d', strtotime($data['invoice']->commande_date));  ?>" class="form-control" id="date_debut" name="datecmd" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status </label>
                                        <div class="form-control-wrap">
                                            <select class="form-control form-select" name="status" id="status" required>
                                                @isset($data['status'])
                                                @foreach($data['status'] as $item)
                                                @if($item->id==$data['invoice']->status_id )
                                                <option value="{{$item->id}}" selected>{{$item->name}} </option>
                                                @else
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                                @endif
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Note</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" id="description" name="description">{{$data['invoice']->remarks}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr><br>
                <div class="container">
                    <div class="">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <table id="myTable" class=" table order-list">
                                    <thead>
                                        <tr>
                                            <td>Désignation</td>
                                            <td>Unité</td>
                                            <td>Quantité</td>
                                            <td>Prix</td>
                                            <td>Total</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{$somme=0}}
                                        @foreach($data['invoice_items'] as $items)
                                        <tr>
                                            <td class="col-sm-3">
                                                <select class="form-control form-select" name="row[{{$loop->iteration}}][product]" id="situation_familialev" required>
                                                 
                                                @isset($data['products'])
                                                    @foreach($data['products'] as $item)
                                                    @if($item->id==$items->product_id )
                                                    <option value="{{$item->id}}" selected>{{$item->name}} </option>
                                                    @else
                                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                            <td class="col-sm-2">
                                                <select class="form-control form-select" name="row[{{$loop->iteration}}][unit]" id="situation_familialev" required>  
                                                @isset($data['unit'])
                                                    @foreach($data['unit'] as $item)
                                                    @if($item->id==$items->unit_id  )
                                                    <option value="{{$item->id}}" selected>{{$item->symbol}} </option>
                                                    @else
                                                    <option value="{{$item->id}}" >{{$item->symbol}} </option>
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                            <td class="col-sm-2">
                                                <input type="number" name="row[{{$loop->iteration}}][quantite]" id="quantite" class="form-control" value="{{$items->quantity}}" />
                                            </td>
                                            <td class="col-sm-2">
                                                <input type="number" name="row[{{$loop->iteration}}][prix]" id="prix" class="form-control" value="{{$items->price}}" />
                                            </td>
                                            <td class="col-sm-2">
                                                <input type="hidden" id='totalglobal' name="total" value="{{$somme+=$items->quantity * $items->price}}">
                                                <input type="number" name="row[{{$loop->iteration}}][prixtotal]" id="prix" class="form-control" value="{{$items->quantity * $items->price}}" />
                                            </td>
                                            <td class="col-sm-2"><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;">
                                                <h5>Total <span id="grandtotal">{{$somme}} </span>DH</h5>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: left;">
                                                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Ajouter produit" />
                                            </td>

                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- .nk-block -->
    </form>
</div>
@endsection