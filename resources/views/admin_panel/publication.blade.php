@extends('admin_panel.layout.main')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1">Все публикации</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Автор</th>
                                    <th>Заголовок</th>
                                    <th class="">Просмотров</th>
                                    <th class="Нравиться">Нравиться</th>
                                    <th class="">Статус</th>
                                    <th class="">Действия</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($publication as $publ)
                                <tr>

                                    <td>{{$publ->date}}</td>
                                    <td>{{$publ->author_id}}</td>
                                    <td>{{$publ->title}}</td>
                                    <td>{{$publ->c_view}}</td>
                                    <td>{{$publ->c_like}}</td>
                                    @if($publ->ischecked==1)<td style="background: #2ead1f">Опубликовано</td> @else<td style="background:#f73242;color: #fff">На проверке</td>   @endif</td>
                                    <td><button class="btn btn-primary">Подробно</button>
                                    @if($publ->ischecked==1)<button class="btn btn-danger">Удалить</button> @else <button class="btn btn-danger">Опубликовать</button> @endif
                                    </td>

                                </tr>

                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="title-1 m-b-25">Top countries</h2>
                        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                            <div class="au-card-inner">
                                <div class="table-responsive">
                                    <table class="table table-top-countries">
                                        <tbody>
                                        <tr>
                                            <td>United States</td>
                                            <td class="text-right">$119,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Australia</td>
                                            <td class="text-right">$70,261.65</td>
                                        </tr>
                                        <tr>
                                            <td>United Kingdom</td>
                                            <td class="text-right">$46,399.22</td>
                                        </tr>
                                        <tr>
                                            <td>Turkey</td>
                                            <td class="text-right">$35,364.90</td>
                                        </tr>
                                        <tr>
                                            <td>Germany</td>
                                            <td class="text-right">$20,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>France</td>
                                            <td class="text-right">$10,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Australia</td>
                                            <td class="text-right">$5,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Italy</td>
                                            <td class="text-right">$1639.32</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                                <button class="au-btn-plus">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                            <div class="au-task js-list-load">
                                <div class="au-task__title">
                                    <p>Tasks for John Doe</p>
                                </div>
                                <div class="au-task-list js-scrollbar3">
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Meeting about plan for Admin Template 2018</a>
                                            </h5>
                                            <span class="time">10:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--warning">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Create new task for Dashboard</a>
                                            </h5>
                                            <span class="time">11:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--primary">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Meeting about plan for Admin Template 2018</a>
                                            </h5>
                                            <span class="time">02:00 PM</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--success">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Create new task for Dashboard</a>
                                            </h5>
                                            <span class="time">03:30 PM</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--danger js-load-item">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Meeting about plan for Admin Template 2018</a>
                                            </h5>
                                            <span class="time">10:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--warning js-load-item">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Create new task for Dashboard</a>
                                            </h5>
                                            <span class="time">11:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-task__footer">
                                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                <button class="au-btn-plus">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                            <div class="au-inbox-wrap js-inbox-wrap">
                                <div class="au-message js-list-load">
                                    <div class="au-message__noti">
                                        <p>You Have
                                            <span>2</span>

                                            new messages
                                        </p>
                                    </div>
                                    <div class="au-message-list">
                                        <div class="au-message__item unread">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">John Smith</h5>
                                                        <p>Have sent a photo</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>12 Min ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item unread">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Nicholas Martinez</h5>
                                                        <p>You are now connected on message</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>11:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Yesterday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Purus feugiat finibus</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Sunday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item js-load-item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Yesterday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item js-load-item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Purus feugiat finibus</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Sunday</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__footer">
                                        <button class="au-btn au-btn-load js-load-btn">load more</button>
                                    </div>
                                </div>
                                <div class="au-chat">
                                    <div class="au-chat__title">
                                        <div class="au-chat-info">
                                            <div class="avatar-wrap online">
                                                <div class="avatar avatar--small">
                                                    <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                </div>
                                            </div>
                                            <span class="nick">
                                                        <a href="#">John Smith</a>
                                                    </span>
                                        </div>
                                    </div>
                                    <div class="au-chat__content">
                                        <div class="recei-mess-wrap">
                                            <span class="mess-time">12 Min ago</span>
                                            <div class="recei-mess__inner">
                                                <div class="avatar avatar--tiny">
                                                    <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                </div>
                                                <div class="recei-mess-list">
                                                    <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                    <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="send-mess-wrap">
                                            <span class="mess-time">30 Sec ago</span>
                                            <div class="send-mess__inner">
                                                <div class="send-mess-list">
                                                    <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-chat-textfield">
                                        <form class="au-form-icon">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                            <button class="au-input-icon">
                                                <i class="zmdi zmdi-camera"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>