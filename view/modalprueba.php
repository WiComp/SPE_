<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>Hello, world!</title>
   </head>
   <body>
      <div class="text-center">
         <a href="" class="btn btn-default" data-toggle="modal" data-target="#modalContactForm">Launch
         Modal Form 1</a>
      </div>    
      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                     <i class="fas fa-user prefix grey-text"></i>
                     <input type="text" id="form34" class="form-control validate">
                     <label data-error="wrong" data-success="right" for="form34">Your name</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="text-center">
         <a href="" class="btn btn-default" data-toggle="modal" data-target="#modalContactForm2">Launch
         Modal Form 2</a>
      </div>
      <div class="modal fade" id="modalContactForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Test of 2nd modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
              
              <p> This is a random test </p>
              
            </div>
         </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
     (function(){
         // instead of using a global template variable,
         // use jQuery.data() to store it on the .modal element itself
         // so it works with multiple modals

         $('.modal').on('show.bs.modal', function (event) {
             if (!$(this).data('template')) {
                 $(this).data('template', $(this).html())
             } else {
                 $(this).html($(this).data('template'))
             }
             // other initialization here, if you want to
         })
     
     })()
  </script>

   </body>
</html>