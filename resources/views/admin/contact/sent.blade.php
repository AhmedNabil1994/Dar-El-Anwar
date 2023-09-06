@extends('layouts.admin')

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="chat" style="min-height: 95vh;height: auto;">
              <header class="chat__header">
                <h2 class="text-center">
                  ContactUs /Sent Messages
                </h2>
              </header>

              <div class="row" style="min-height: 95%;height: auto;">
                <div class="col-md-3  height-full">
              <!-- Start chat sidebar -->
              <div class="chat__sidebar border mt-4">
                <h6>
                 Conversation 
                </h6>
                <ul class="chat__list">
                  <li>
                    <a href="#">
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/teacher.png" alt="archived">
                      
                    my Teachers</a>
                  </li>
                  <li>
                    <a href="#">
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/recieved.png" alt="archived">
                      Recieving Messages</a>
                  </li>
                  <li>
                    <a href="#">
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/sent.png" alt="archived">
                      Sending Messages
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/chat.png" alt="archived">
                    Chats</a>
                  </li>
                </ul>
              </div>
              <!-- end chat sidebar -->
            </div>
                <div class="col-md-9">
                  <div class="chat__content px-3">
                    <div class="chat__filters ">
                      <form class="row">
                        <div class="col-md-4">
                          <div class="input__group mt-3 mb-3">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input__group mt-3 mb-3">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input__group mt-3 mb-3">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        <div class="show-filter">
                          <a href="#">
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/add.png" alt="archived">
                            add 
                          </a>
                          <a href="#">
                            <img class="img-responsive w-full" src="{{ asset('admin') }}/images/messages/show.png" alt="archived">
                            show 
                          </a>
                        </div>
                      </form>
                    </div>
                    <div class="chat__box">
                      <div class="chat__data">
                        <form action="">
                        <div>
                          <div class="input__group mt-2 mb-2">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        <div>
                          <div class="input__group mt-3 mb-3">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        <div>
                          <div class="input__group mt-3 mb-3">
                            <label>{{ trans('website.parents_social_status') }} <span class="text-danger">*</span></label>
                            <input type="text" name="parents_social_status" class="form-control-file">
                          </div>
                        </div>
                        </form>
                      </div>
                      <!-- <div class="chat__txt">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, distinctio voluptates blanditiis maiores officia temporibus, nobis sit ab exercitationem magni autem deleniti esse. Nulla veritatis asperiores omnis nobis sed. Sit, in voluptas. Facilis atque aspernatur ea modi magnam eius saepe perspiciatis veniam sunt veritatis deleniti molestias nulla commodi a unde perferendis voluptates deserunt obcaecati at asperiores, amet iste. Sunt pariatur error id praesentium facilis nulla eveniet dolores nemo quis! Culpa quod quisquam saepe recusandae itaque ipsum quae earum esse consectetur consequuntur ex blanditiis sint sit modi a explicabo error excepturi sequi, alias optio rerum. Harum nobis labore corporis temporibus fugiat vero officia iure quis expedita voluptatibus amet nemo aliquam placeat qui aliquid eius dolor rerum, ea at quas, quo est neque atque odit! Enim voluptates libero suscipit a, nemo, quam nobis ipsa expedita ipsam ex ullam iure laborum inventore deserunt quia voluptatum consectetur unde natus, numquam necessitatibus dolore. Accusamus optio minus alias nesciunt aperiam? Ex hic nostrum ipsa laudantium pariatur eveniet voluptates assumenda quidem, ipsam eos magnam veniam illo sint esse accusamus sit. Facere perspiciatis magni fuga possimus totam saepe, quas molestias repellat perferendis fugit inventore, nisi velit? Suscipit enim tenetur iusto? A quis doloribus aperiam nobis numquam doloremque iure sunt? Blanditiis explicabo id illo earum voluptas dolor saepe nulla iste, error, neque suscipit, aliquam assumenda quaerat non nobis totam. Beatae, esse totam! Deserunt iste inventore, libero et debitis beatae rem ex molestiae quos quisquam labore ratione, fugit quibusdam corporis nisi, incidunt illo magni voluptatum vitae sint? Quis, itaque expedita repudiandae minus numquam eius nobis nulla natus assumenda voluptatibus laboriosam, repellat tempora qui temporibus provident ducimus quisquam autem maxime! Doloribus quaerat dicta exercitationem dolorem sapiente nulla laborum sed nesciunt incidunt rem praesentium repellendus iste, aspernatur ipsa aliquam dolore deserunt eos. Recusandae nisi enim natus. Odit voluptas expedita eligendi neque dignissimos temporibus beatae ducimus repellendus suscipit, officiis nam laudantium praesentium voluptate sed voluptates? Fuga pariatur repellendus fugiat voluptas explicabo reprehenderit saepe quod rem ab hic sunt blanditiis, eveniet molestias quam nostrum assumenda commodi esse quaerat? Aut possimus quidem, neque sint, voluptatem vero dolores nemo non itaque animi facere, ipsum maxime delectus alias. Ipsum nisi deserunt commodi, non aliquam fugiat exercitationem, cupiditate quis alias velit dolorum in et quo perspiciatis architecto quod excepturi quisquam molestias laboriosam. Temporibus iure porro ab, nesciunt repellat nobis inventore provident nisi, autem sunt minima suscipit esse praesentium, ea odio officiis maxime magnam facilis! Voluptas non eligendi, beatae aliquam voluptatum voluptate optio perferendis molestiae provident eius autem cumque iste, sit atque assumenda repellat recusandae nemo ad quod eos quasi laudantium, nisi tempore? Assumenda magnam aliquam eius cum in beatae harum, quaerat labore quis ipsum nobis recusandae ipsam dolor deserunt natus esse laudantium sed ducimus reiciendis? Magnam repellendus magni neque at quis in fugiat commodi porro aliquid est veniam sit repellat, doloremque atque facilis. Earum perferendis inventore sapiente, animi laudantium ex quisquam harum blanditiis. Pariatur, et facilis voluptatem ratione omnis culpa modi recusandae tempore necessitatibus, dolores neque explicabo suscipit, facere minima accusantium consequatur voluptates? Excepturi sapiente dolorum sequi? Reprehenderit.</div> -->
                      <div class="chat__txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, sunt.</div>
                      <div class="chat__footer">
                        <div>first`</div>
                        <div>last</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
