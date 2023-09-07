<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Menu Vegetarian</h4>
        </div>
        <form method="post" class="addonsCartForm" action="{{ route('menu.item.cart') }}">
            @csrf
            <div class="modal-body">
                <div class="detailElement">

                    <input type="hidden" name="setmenu_id" value="{{ @$setmenu_categories[0]->setmenu->id }}">

                    @foreach($setmenu_categories as $setmenu_category)
                    <h4>{{ $setmenu_category->name }}</h4>
                    <div class="radioElement">

                        <select name="item[]" class="form-control">
                            @foreach($setmenu_category->setmenu_products as $key => $setmenu_product)
                            <option value="{{ $setmenu_product->name }}">{{ $setmenu_product->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No Thanks</button>
                <button type="submit" class="btn btn-success modalBtn">Add</button>
            </div>
        </form>
    </div>
</div>

