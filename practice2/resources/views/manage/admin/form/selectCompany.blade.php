<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#selectCompany-{{ $product->gtin }}">{{ $title }}</button>
<div class="modal fade" id="selectCompany-{{ $product->gtin }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ $action }}" method="post">
                @csrf
                @method($method)
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{ $product->gtin }}">
                        @foreach($companys as $company)
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" name="company_id" type="radio" value="{{ $company->id }}" aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" value="{{ $company->name }}"  class="form-control" aria-label="Text input with checkbox" disabled>
                            </div>
                        @endforeach
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $title }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>