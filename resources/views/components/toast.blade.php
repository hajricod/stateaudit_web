<div style="
    min-height: 100px;
    position: fixed;
    z-index: 1;
    width: 100%;
    bottom:0;
">
  <div id="toast" aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-header">
          <button id="btnToastClose" type="button" class="p-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body {{app()->getLocale() == 'ar' ? 'text-right' : ''}}">
          {{$message}}
        </div>
      </div>
  </div>
</div>