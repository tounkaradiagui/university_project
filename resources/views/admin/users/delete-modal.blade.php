<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #0050e3;">
                <h5 class="modal-title" id="deleteModalExample">Voulez-vous supprimé cet utilisateur ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Cliquez sur Oui pour supprimé ou Non pour annuler !.</div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Non</button>
                <a class="btn btn-danger" href=""
                    onclick="event.preventDefault(); document.getElementById('user-delete-form').submit();">
                    Oui
                </a>
                <form id="user-delete-form" method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
