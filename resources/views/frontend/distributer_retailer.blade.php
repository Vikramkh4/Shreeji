@extends('frontend.layout')
@section('contet')
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
			    <body>

 
</body>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
				        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
				<form action="{{ url('save_distributer') }}" method="post">
    <!-- CSRF token (important for Laravel forms) -->
    @csrf
    <h4 class="mtext-105 cl2 txt-center p-b-30">
        Send Us A Message
    </h4>

    <!-- Name Input -->
    <div class="bor8 m-b-20 how-pos4-parent">
        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" 
               type="text" 
               name="name" 
               placeholder="Your Name" 
               ''>
    </div>

    <!-- Email Input -->
    <div class="bor8 m-b-20 how-pos4-parent">
        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" 
               type="email" 
               name="email" 
               placeholder="Your Email Address" 
               ''>
    </div>

    <!-- Mobile Number Input -->
    <div class="bor8 m-b-20 how-pos4-parent">
        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" 
               type="tel" 
               name="mob" 
               placeholder="Your Contact Number" 
               pattern="[0-9]{10}" 
               ''>
    </div>

    <!-- Address Input -->
    <div class="bor8 m-b-20 how-pos4-parent">
        <input class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" 
               type="text" 
               name="address" 
               placeholder="Your Address" 
               ''>
    </div>

    <!-- Role Select -->
    <div class="bor8 m-b-20 how-pos4-parent">
        <select name="role" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" ''>
            <option value="{{ $title }}">{{ $title }}</option>
        </select>
    </div>

    <!-- Message Textarea -->
    <div class="bor8 m-b-30">
        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" 
                  name="message" 
                  placeholder="Message" 
                  ''></textarea>
    </div>

    <!-- Submit Button -->
    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
        Submit
    </button>
</form>

					
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
							3rd Floor, Mateshwari Complex, Darji Oli, Lashkar, Gwalior (M.P.) 
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								Contact No- +91-9406972478 / +91-8305018444
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
							shreejienterprises787@gmail.com
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	@endsection

	