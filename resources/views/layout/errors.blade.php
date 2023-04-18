<div class="row">

    @isset($ajax_errors)
        <div class="col-md-4">
            <div class="al-alert al-active alert alert-danger bg-danger" id="cu-errors">
                <div class="al-heading">
                    <div class="text-white">
                        <i data-feather="alert-octagon"></i>
                    </div>
                    <div class="al-title text-white ml-3 font-weight-bold">Error</div>
                    <button type="button" class="btn btn-link text-white p-0 m-0 ml-auto" id="cu-errors-close" onclick="document.getElementById('cu-errors').classList.remove('al-active')">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="al-body text-white">
                    @foreach ($ajax_errors as $error_list)
                        @foreach($error_list as $message)
                        <p class="mb-0">{{ $message }}</p>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    @endisset




    @if ($errors->any())
        <div class="col-md-4">
            <div class="al-alert alert alert-danger bg-danger" id="errors">
                <div class="al-heading">
                    <div class="text-white">
                        <i data-feather="alert-octagon"></i>
                    </div>
                    <div class="al-title text-white ml-3 font-weight-bold">Error!!!</div>
                    <button type="button" class="btn btn-link text-white p-0 m-0 ml-auto" id="errors-close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="al-body text-white">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('success'))
            <?php
            $autoclose = null;
            if(session()->has('success.autoclose')) {
                $autoclose = 'autoclose="'. session()->get('success.autoclose') .'"';
            }
            ?>
            <div class="col-md-4">
                <div class="al-alert alert alert-success bg-success" id="success" {!! $autoclose !!}>
                    <div class="al-heading">
                        <div class="text-white">
                            <i data-feather="check-circle"></i>
                        </div>
                        <div class="al-title text-white ml-3 font-weight-bold">{{session()->get('success')["heading"]}}</div>
                        <button type="button" class="btn btn-link text-white p-0 m-0 ml-auto" id="success-close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="al-body text-white">
                        @foreach (session()->get('success')["messages"] as $success)
                            <p class="mb-0">{{ $success }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
    @endif




    <script>
        @if ($errors->any()) ku_toast('#errors'); @endif
        @if(session()->has('success')) ku_toast('#success'); @endif

        function ku_toast(selector) {
            let el = document.querySelector(selector);
            el.classList.add("al-active");
            el.querySelector(`${selector}-close`).addEventListener('click', function() {
                el.classList.remove("al-active");
            });
            if(el.getAttribute('autoclose')) {
                let autoclose = el.getAttribute('autoclose');
                setTimeout(()=>{
                    el.classList.remove("al-active");
                }, autoclose)
            }
        }
    </script>


{{--
    <div class="col-md-4">
        <div class="alert alebg-warning fade show bg-warning">
            <div class="al-heading">
                <div class="text-white">
                    <i data-feather="alert-triangle"></i>
                </div>
                <div class="al-title text-white ml-3 font-weight-bold">Warning!!!</div>
                <button type="button" class="btn btn-link text-white p-0 m-0 ml-auto" data-dismiss="alert">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="al-body text-white">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque aut corporis debitis deserunt dolorem dolores doloribus ex expedita fuga, magni, maiores nobis non porro, possimus quae quo recusandae tempora veniam.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="alert alebg-info fade show bg-info">
            <div class="al-heading">
                <div class="text-white">
                    <i data-feather="alert-triangle"></i>
                </div>
                <div class="al-title text-white ml-3 font-weight-bold">Warning!!!</div>
                <button type="button" class="btn btn-link text-white p-0 m-0 ml-auto" data-dismiss="alert">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="al-body text-white">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque aut corporis debitis deserunt dolorem dolores doloribus ex expedita fuga, magni, maiores nobis non porro, possimus quae quo recusandae tempora veniam.
            </div>
        </div>
    </div>--}}



</div>
