<!DOCTYPE html>
<html lang="en">

{{-- Head Tag --}}
@include('components.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- Topbar --}}
                @include('components.topbar')

                {{-- Main Content --}}
                {!! $content !!}

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                {{-- Logout Modal --}}
                @include('components.logout_modal')

            </div>

            {{-- Footer --}}
            @include('components.footer')

        </div>
    </div>


</body>

</html>
