<script src="{{asset('/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('/assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



<script type="text/javascript">


$(document).ready(function(){
 
 fetch_customer_data();



// editer un module, dans ce cas on doit afficher les informations du modules dans une formulaire pour les modifier
  // déclaration du csrf ajax

            $(document).on('click', '.editbtnAvis', function(e) {
                e.preventDefault();
                //récuperation de l'id
                let id_avis = $(this).val();
                //afficher le Modal de modification après une clique sur le bouton editer
                $('#modalModifier').modal('show');
                console.log(id_avis);
                $.ajax({
                    //requete
                    type: "GET",
                    url: "/editAvis/" + id_avis,
                    ///reponse
                    success: function(response) {
                        //response est sous forme fichier JSON envoyé auprès de controller
                        //les test sur l'état de l'operation
                        //le cas echouant
                        console.log(response);
                        if (response.status == 404) {
                            $('#modalModifier').modal('hide');
                        } else {//sinon, on remplie les champs de formulaire par les information du module envoyée par le controller
                            $('#id_avis').val(id_avis);
                            $('#titre').val(response.Avis.titre);
                            $('#id_publieur').val(response.Avis.publier_par);
                            $('#type').val(response.Avis.type);
                            $('#fichier_pdf').val(response.Avis.fichier_pdf);
                            $('#image').val(response.Avis.image);
                            $('#description').val(response.Avis.description);

                        }
                    }
                });
                $('.btn-close').find('input').val('');
            });

            // apres avoir obtenu les information on fait la modification en utilisant le script suivant
            $(document).on('click', '.update_Avis', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                let id = $('#id_avis').val();
                console.log(id)
                // les nouvelles données saisiées
                let data = {
                    'titre': $('#titre').val(),
                    'publier_par': $('#id_publieur').val(),
                    'type': $('#type').val(),
                    'fichier_pdf': $('#fichier_pdf').val(),
                    'image': $('#image').val(),
                    'description': $('#description').val(),
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //requete
                $.ajax({
                    type: "GET",
                    url: "updateavis/" + id,
                    data: data,
                    dataType: "json",
                    //reponse
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $.each(response.errors, function(key, err_value) {

                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.error(err_value, "Alert Message");
                            });
                            $('.update_Avis').text('Update');
                        } else {
                            $(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "0",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.success(response.message, "Success Message");
                            });
                            $('#modalModifier').find('input').val('');
                            $('.update_Avis').text('Update');
                            $('#modalModifier').modal('hide');
                            $('.matable').load(location.href + ' .matable')
                            countmodules();
                        }
                    }
                });
            });


            // affichage de Modal de suppression d'un module si on clique sur supprimer
            /*$(document).on('click', '.deletebtn', function() {
                let id = $(this).val();
                console.log(id);
                $('#DeleteAvis').modal('show');
                $('#Avis_id').val(id);
            });
            // l'operation de suppression après confirmation.
            $(document).on('click', '.delete_avis', function(e) {
                e.preventDefault();

                $(this).text('Deleting...');
                let id = $('#Avis_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //requete.
                $.ajax({
                    type: "DELETE",
                    url: "/deleteavis/" + id,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            $('.delete_avis').text('Confirmer');
                            $(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "0",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.error(response.message, "Success Message");
                            });
                        } else {
                            $('.delete_avis').text('Confirmer');
                            $('#DeleteAvis').modal('hide');

                            $(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "0",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.success(response.message, "Success Message");
                            });


                            $('.matable').load(location.href + ' .matable')
                            countmodules();

                        }
                    }
                });
            });*/

        </script>




<script type="text/javascript">
// editer un module, dans ce cas on doit afficher les informations du modules dans une formulaire pour les modifier
  // déclaration du csrf ajax
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $(document).on('click', '.editbtnCours', function(e) {
                e.preventDefault();
                //récuperation de l'id
                let id_cours = $(this).val();
                //afficher le Modal de modification après une clique sur le bouton editer
                $('#modalCours').modal('show');
                console.log(id_cours);
                $.ajax({
                    //requete
                    type: "GET",
                    url: "/editCours/" + id_cours,
                    ///reponse
                    success: function(response) {
                        //response est sous forme fichier JSON envoyé auprès de controller
                        //les test sur l'état de l'operation
                        //le cas echouant
                        console.log(response);
                        if (response.status == 404) {
                            $('#modalCours').modal('hide');
                        } else {//sinon, on remplie les champs de formulaire par les information du module envoyée par le controller
                            $('#id_cours').val(id_cours);
                            $('#nom').val(response.cours.nom);
                            $('#description').val(response.cours.description);
                            $('#semestre').val(response.cours.semestre);

                        }
                    }
                });
                $('.btn-close').find('input').val('');
            });


                 // apres avoir obtenu les information on fait la modification en utilisant le script suivant
                 $(document).on('click', '.update_Cours', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                let id = $('#id').val();
                console.log(id)
                // les nouvelles données saisiées
                let data = {
                    'nom': $('#nom').val(),
                    'pdf': $('#pdf').val(),
                    'description': $('#description').val(),
                    'semestre': $('#semestre').val(),

                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //requete
                $.ajax({
                    type: "POST",
                    url: "/updatecours/" + id,
                    data: data,
                    dataType: "json",
                    //reponse
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $.each(response.errors, function(key, err_value) {

                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.error(err_value, "Alert Message");
                            });
                            $('.update_Cours').text('Update');
                        } else {
                            $(function() {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "0",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                toastr.success(response.message, "Success Message");
                            });




                            $('#editbtnCours').find('input').val('');
                            $('.update_Cours').text('Update');
                            $('#editbtnCours').modal('hide');
                            $('.matable').load(location.href + ' .matable')
                            countmodules();

                        }
                    }

                });





            });
        </script>
@yield('script')
