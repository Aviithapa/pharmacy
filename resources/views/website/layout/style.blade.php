<link rel="shortcut icon" href="{{asset ('images/logo.png') }}">
<script src="{{ asset('assets/js/config.js') }}"></script>
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<style> 
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.pagination-info,
.pagination-dropdown,
.pagination-links {
    flex: 1;
}

.pagination-dropdown {
    margin: 0 10px; /* Add space between the dropdown and the other elements */
}

.select2-container--default .select2-selection--single{
   padding: 0.35rem 2.7rem 2rem 0.9rem;
   font-size: .875rem;
    font-weight: 400;
    border-color:#dee2e6;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 7px !important;    
    right: 5px !important;
}
</style>