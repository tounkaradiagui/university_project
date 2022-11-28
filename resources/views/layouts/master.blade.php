<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name', 'Université de Ségou')}} - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link rel="shortcut icon" href="{{asset('admin/img/FSEG.jpg')}}" type="image/x-icon">
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="{{asset('admin/vendor/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" 
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <style>
        section{
            padding-top:100px;
        }

        .form-section{
            padding-left:15px;
            display:none;
        }

        .form-section.current{
            display:inherit;
        }

        .btn-primary, .btn-success{
            margin-top:15px;
        }

        .parsley-errors-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type:none;
            color:red;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #0050e3;">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt pour vous déconnecter ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span class="text-white"  aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Cliquez sur le boutton poursuivre pour fermer la session.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Poursuivre') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>


    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>


    <script>
        $(function () {
           var $sections = $('.form-section');

           function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);

                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
           }



           function curIndex()
            {
                return $sections.index($sections.filter('.current'));

            }

            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function(){
                $('.contact-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
                
            });

            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);

                
            });
            
            navigateTo(0);
        });
    </script>

    <script>
        $(function(e){
            $("#chkCheckAll").click(function(){
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            });

            $("#deleteAllSelectRecord").click(function(e){
                e.preventDefault();

                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });


                $.ajax({
                    url:"{{route('delete.etudiants')}}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },

                    success:function(response){
                        $.each(allids, function(key,val){
                            $("#sid"+val).remove();
                        })
                    }
                });
            });
        });
    </script>


    <script>
        $('#studentForm').submit(function(e){
            e.preventDefault();

            let nom = $(#nom).val();
            let prenom = $(#prenom).val();
            let email = $(#email).val();
            let phone = $(#phone).val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url:"{{route('add.students')}}",
                type:"POST",
                data:{
                    nom:nom,
                    prenom:prenom,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function(response)
                {
                    if(response)
                    {
                        $("#dataTable tbody").prepend('<tr><td>'+ response.nom+'</td><td>'+response.prenom+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>');
                        $(#"studentForm")[0].reset();
                        $(#"exampleModal").modal('hide');
                    }
                }
            });
        });
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
{{--    <script>
        var datas = <?php echo json_encode($datas) ?>

        Highcharts.chart('chart-container', {
            title:{
                text:'Augmentation "Etudiant, 202'
            },
            subtitle:{
                text:'Source: Diagui SERVICE '
            },
            xAxis:{
                categories:['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sept', 'Oct', 'Nov', 'Déc']
            },
            yAxis:{
                title:"Nombre de nouveaux étudiants"
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                name:'Nouveaux étudiants',
                data.datas
            }],
            responsive:{
                rules:[
                    {
                        condition:{
                            maxWidth:500
                        },
                        chartOptions:{
                            legend:{
                                layout:'horizontal',
                                align:'center',
                                verticalAlign:'bottom'
                            }
                        }
                    }
                ]
            }


        })
    </script> --}}

</body>

</html>