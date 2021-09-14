<button 
class="btn btn-danger rounded-circle ml-1 p-1" 
data-toggle="modal" 
data-target="#deleteModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
</button>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header border-0" dir="ltr">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('Would you like to delete this record?')}}</p>
            </div>
            <div class="modal-footer">
                <form action="{{$url}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary" id="accepted">{{__('Yes')}}</button>
                </form>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
            </div>
        </div>
    </div>
</div>