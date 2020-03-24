<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="sidebar-search-wrapper">
            </li>


            <li class="nav-item  @php echo " active",(request()->path() != 'home')?:"";



                @endphp">
                <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="title">Dashboard </span>
                    <span class="selected"></span>
                </a>
            </li>

            {{-- <li class="nav-item  @if( request()->path() == 'fund' ) active open @endif
            @if( request()->path() == 'deposit/store' ) active open @endif
            @if( request()->path() == 'add/confirm' ) active open @endif">
                <a href="{{route('add.fund.index')}}" class="nav-link ">
            <i class="far fa-credit-card"></i>
            <span class="title">Deposit Fund</span>
            <span class="selected"></span>
            </a>
            </li> --}}

            <li class="nav-item  @if( request()->path() == 'withdraw' ) active open @endif
            @if( request()->path() == 'withdraw/preview' ) active open @endif">
                <a href="{{route('request.users_management.index')}}" class="nav-link ">
                    <i class="fas fa-spinner"></i>
                    <span class="title">Request Withdraw</span>
                    <span class="selected"></span>
                </a>
            </li>




            <li class="nav-item  @php echo " active",(request()->path() != 'transaction')?:"";









                @endphp">
                <a href="{{route('transaction.history')}}" class="nav-link nav-toggle">
                    <i class="far fa-clone"></i>
                    <span class="title">Transaction History </span>
                    <span class="selected"></span>
                    <span class="selected"></span>
                </a>
            </li>




            <li class="nav-item  <?php echo request()->path() == 'referral/commission' ? 'active' : ''; ?>
            <?php echo request()->path() == 'binary/commission' ? 'active' : ''; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="far fa-money-bill-alt"></i>
                    <span class="title"> My Income</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'referral/commission' ) active open @endif">
                        <a href="{{route('ref.commision.index')}}" class="nav-link ">
                            <i class="fas fa-users"></i>
                            <span class="title">Referral Commission</span>
                        </a>
                    </li>

                    {{--  <li class="nav-item  @if( request()->path() == 'binary/commission' ) active open @endif">
                        <a href="{{route('bin.commision.index')}}" class="nav-link ">
                    <i class="fas fa-dollar-sign"></i>
                    <span class="title">Binary Commission</span>
                    </a>
            </li> --}}
        </ul>
        </li>

        <li class="nav-item  <?php echo request()->path() == 'binary/summery' ? 'active' : ''; ?>
            <?php echo request()->path() == 'tree' ? 'active' : ''; ?>
            <?php echo request()->path() == 'referral' ? 'active' : ''; ?>">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fas fa-info-circle"></i>
                <span class="title">Marketing</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                {{--  <li class="nav-item  @if( request()->path() == 'binary/summery' ) active open @endif">
                        <a href="{{route('binary.summery.index')}}" class="nav-link ">
                <i class="fas fa-suitcase"></i>
                <span class="title">Binary Summery </span>
                </a>
        </li>

        <li class="nav-item  @if( request()->path() == 'tree' ) active open @endif">
            <a href="{{route('tree.index')}}" class="nav-link ">
                <i class="fas fa-sitemap"></i>
                <span class="title">My Tree</span>
            </a>
        </li> --}}

        <li class="nav-item  @if( request()->path() == 'referral' ) active open @endif">
            <a href="{{route('referral.index')}}" class="nav-link ">
                <i class="fas fa-registered"></i>
                <span class="title">My Referral</span>
            </a>
        </li>
        </ul>
        </li>



        <li class="nav-item @php echo " active",(request()->path() != 'profile')?:"";









            @endphp
            @php echo "active",(request()->path() != 'security')?:"";









            @endphp
            @php echo "active",(request()->path() != 'security/two/step')?:"";









            @endphp">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fas fa-cogs"></i>
                <span class="title">General Settings</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  @if( request()->path() == 'profile' ) active open @endif">
                    <a href="{{ route('profile.index') }}" class="nav-link ">
                        <i class="fas fa-user-circle"></i>
                        <span class="title">My Profile</span>
                    </a>
                </li>

                <li class="nav-item  @if( request()->path() == 'security' ) active open @endif">
                    <a href="{{ route('security.index') }}" class="nav-link ">
                        <i class="fas fa-key"></i>
                        <span class="title">Change Password</span>
                    </a>
                </li>

                <li class="nav-item  @if( request()->path() == 'security/two/step' ) active open @endif">
                    <a href="{{route('two.factor.index')}}" class="nav-link ">
                        <i class="fas fa-lock"></i>
                        <span class="title">Security</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item  @if( request()->path() == 'support/new' ) active open @endif
            @if( request()->path() == 'support' ) active open @endif">
            <a href="{{route('support.index.customer')}}" class="nav-link ">
                <i class="fas fa-ticket-alt"></i>
                <span class="title">Support Ticket</span>
            </a>
        </li>

        <li class="nav-item  @php echo " active",(request()->path() != '')?:"";









            @endphp
            @php echo "active",(request()->path() != 'advertises')?:"";









            @endphp">
            <a href="{{route('ptc.add.index')}}" class="nav-link nav-toggle">
                <i class="fas fa-mouse-pointer"></i>
                <span class="title">Click Advertise </span>
                <span class="selected"></span>
            </a>
        </li>

        {{--  <li class="nav-item @php echo " active",(request()->path() != 'create/advertise')?:"";
                



@endphp
                @php echo "active",(request()->path() != 'my/advertises')?:""; 



@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fab fa-adversal"></i>
                    <span class="title">Make Your Ad</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'create/advertise' ) active open @endif">
                        <a href="{{route('my.advertise')}}" class="nav-link ">
        <i class="fas fa-mouse-pointer"></i>
        <span class="title">Create Ad</span>
        </a>
        </li>

        <li class="nav-item  @if( request()->path() == 'my/advertises' ) active open @endif">
            <a href="{{route('manage.advertise')}}" class="nav-link ">
                <i class="fas fa-key"></i>
                <span class="title">Manage Ad</span>
            </a>
        </li>
        </ul>
        </li> --}}

        <li class="nav-item  @php echo " active",(request()->path() != '')?:"";






            @endphp
            @php echo "active",(request()->path() != 'affiliate')?:"";









            @endphp">
            <a href="{{route('affiliate')}}" class="nav-link nav-toggle">
                <i class="fas fa-mouse-pointer"></i>
                <span class="title">Your Affiliate Link </span>
                <span class="selected"></span>
            </a>
        </li>

        </ul>
    </div>
</div>