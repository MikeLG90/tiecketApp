<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        Folio 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/apps/invoice-preview.scss'])
        @vite(['resources/scss/dark/assets/apps/invoice-preview.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container">
                            <div class="invoice-inbox">
                                
                                <div id="ct" class="">
                                    
                                    <div class="invoice-00001">
                                        <div class="content-section">

                                            <div class="inv--head-section inv--detail-section">
                                            
                                                <div class="row">

                                                    <div class="col-sm-6 col-12 mr-auto">
                                                        <div class="d-flex">
                                                            <img class="" src="{{Vite::asset('resources/images/rppc_logo2.png')}}" width="140" height="50" alt="company">
                                                        </div>
                                                        <p class="inv-street-addr mt-3">C. 22 de Enero s/n, Centro, 77000</p>
                                                        <p class="inv-email-address">Chetumal, Q.R.</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 text-sm-end">
                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span class="inv-title">Folio número : </span> <span class="inv-number">{{ $folio->num_folio }}</span></p>
                                                        <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Fecha: </span> <span class="inv-date">{{ $fecha }}</span></p>
                                                    </div>                                                                
                                                </div>
                                                
                                            </div>

                                            <div class="inv--detail-section inv--customer-detail-section">

                                                <div class="row">

                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                        <p class="inv-to">Generado por:</p>
                                                    </div>

                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                    <p class="inv-to">Para:</p>
                                                    </div>
                                                    
                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                        <p class="inv-customer-name">{{ $user->name }}</p>
                                                        <p class="inv-email-address">{{ $user->email }}</p>
                                                    </div>
                                                    
                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                        <p class="inv-customer-name">{{ $folio->destinatario }}</p>
                                                        <p class="inv-to">Oficina:</p>
                                                        <p class="inv-customer-name">{{ $folio->oficina }}</p>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div> 
                                    
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
                
            </div>

        </div>
    </div>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        @vite(['resources/assets/js/apps/invoice-preview.js'])
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>