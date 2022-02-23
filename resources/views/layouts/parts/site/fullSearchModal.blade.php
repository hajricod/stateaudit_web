<div class="modal fade" id="searchModalToggle" aria-hidden="true" aria-labelledby="searchModalToggleLabel" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content" style="font-size: 70px;background-color: rgb(78 25 26 / 72%)!important;">
        <div class="modal-header border-0">
            <button type="button" class="btn text-light" class="close" data-bs-dismiss="modal" aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="/search" method="get">
                                <input class="form-control" type="text" name="search" id="input-main-search">
                                <div class="d-grid gap-2 my-2">
                                    <button type="submit" class="btn text-light btn-lg">{{__('Search')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>