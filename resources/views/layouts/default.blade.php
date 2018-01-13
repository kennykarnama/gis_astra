<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

     <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">

     <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.materialize.css')}}">

     <style type="text/css">
table.dataTable thead .sorting {
  background-repeat: no-repeat;
  background-position: center right;
  background-image: url("images/sort_both.png"); }
table.dataTable thead .sorting_asc {
  background-repeat: no-repeat;
  background-position: center right;
  background-image: url("images/sort_asc.png"); }
table.dataTable thead .sorting_desc {
  background-repeat: no-repeat;
  background-position: center right;
  background-image: url("sort_desc.png"); }
table.dataTable thead .sorting_asc_disabled {
  background-repeat: no-repeat;
  background-position: center right;
  background-image: url("sort_asc_disabled.png"); }
table.dataTable thead .sorting_desc_disabled {
  background-repeat: no-repeat;
  background-position: center right;
  background-image: url("sort_desc_disabled.png"); }
 
.dataTables_wrapper .dataTables_filter {
  width: 30rem; }
  .dataTables_wrapper .dataTables_filter i {
    font-size: 2rem;
    float: left;
    margin-right: .5rem; }
  .dataTables_wrapper .dataTables_filter input {
    width: calc(100% - 7rem); }
  .dataTables_wrapper .dataTables_filter .btn-floating {
    margin-right: .5rem; }
.dataTables_wrapper .dataTables_info {
  font-size: .9rem;
  float: left; }
.dataTables_wrapper .dataTables_paginate {
  padding-top: 0.25em; }
  .dataTables_wrapper .dataTables_paginate a {
    margin: 0 .5rem; }
.dataTables_wrapper .dataTables_processing {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 40px;
  margin-left: -50%;
  margin-top: -25px;
  padding-top: 20px;
  text-align: center;
  font-size: 1.2em;
  background-color: white;
  background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
  background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
  background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%); }
.dataTables_wrapper:after {
  visibility: hidden;
  display: block;
  content: "";
  clear: both;
  height: 0; }
\@media screen and (max-width: 360px) {
  .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate {
    float: none;
    text-align: center; }
  .dataTables_wrapper .dataTables_paginate {
    margin-top: 0.5em; } }
\@media screen and (max-width: 768px) {
  .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter {
    float: none;
    text-align: center; }
  .dataTables_wrapper .dataTables_filter {
    margin-top: 0.5em; } }
     </style>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

       <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    </head>

    <body>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        @stack('scripts')
    
    <!-- Navbar goes here -->
    
    @include('includes.nav')
   

    <!-- Page Layout here -->
    <div class="row">

    
        @yield('content')
     
      

    </div>

    

     <script type="text/javascript">
        
        $(document).ready(function () {
          // body...
          $(".mynav").sideNav();

          $('select').material_select();

           $('.modal').modal();

           $('ul.tabs').tabs({
            'swipeable':true
           });

           $('.collapsible').collapsible();

            $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });

        });

        $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

       
      </script>

    
    </body>
  </html>