
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 container">
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <!doctype html>
       
        <span class="fs-4">LENS ELEMENTS</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Gallary</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        <button type="button" class="btn text-bg-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
             Signout
        </button>      
        </ul>

      
    </header>
<!-- Button trigger modal -->


<!-- Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you wanna signout
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn text-bg-danger">Yeah...</button>
      </div>
    </div>
  </div>
</div>


<script>
  const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
  </script>
