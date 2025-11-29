<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Details</title>
        <!-- Favicon needs to be file type .ico, .png or .svg: <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpg"> -->

        @vite(['resources/css/app.css','resources/css/product_detail.css','resources/js/product_detail.js'])
        
    </head>
    <body class="h-[110vh] bg-white flex flex-col">

        <header class="flex justify-between items-center h-12 w-full p-3 bg-green-primary dark:bg-black ">
            <img src="{{ asset('/images/logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/> <!-- Logo -->

            <nav> <!-- Navigation -->
                 <ul class="flex gap-2.5 font-bold text-white" > <!-- AT END. Insert href links -->
                    <li><a class=" hover:text-beige-third" href="x">Home</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Shop</a></li>
                    <li><a class=" hover:text-beige-third" href="x">About</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Contact</a></li>
                    <li><a name="cart" class=" hover:text-beige-third" href="x">Cart</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Login</a></li>
                </ul>
            </nav>
        </header>

        <main class="flex flex-col grow items-center w-full gap-5">

            <div class="flex flex-col items-center">
                <h1 class="font-bold text-5xl text-green-secondary mt-5">Product Name Here</h1> <!-- XX. php insertion-->

                <nav> <!-- Secondary Navigation -->
                    <ul class="flex mb-5 font-bold text-black items-center" > <!-- AT END. Insert href links -->
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Home</a></li>
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Shop</a></li>
                        <li><a class="text-orange-primary " href="x">Category</a></li>
                    </ul>
                </nav>
            </div>

            <div class="flex w-[95%] mb-5 gap-3"> <!-- TODO Dynamically increase height based on info added. Apply wrap when size reached -->
                <img class="w-[50%] h-[50%] rounded-2xl" src="{{asset('images/placeholder1.png')}}" alt="product image"/> <!-- XX. php insertion. Insert product name in alt Product Image -->

                <section class="flex flex-col w-[50%] h-full gap-3 p-5 bg-beige-primary rounded-3xl"> <!-- Product details -->
                    <div class="flex items-center gap-5">                                     
                        <h3 class="text-2xl font-bold text-green-secondary"> Product Title </h2>
                        <p> Star Ratings </p> <!-- XX. php insertion. Insert calculated ratings -->
                    </div>

                    <p class="font-bold text-2xl text-green-secondary"> £ Price </p> <!-- POTENTIAL consider currencies. -->
                    
                    <p class=" eading-relaxed max-w-[90%] text-gray-900"> <!-- TODO Limit how long the text can be -->
                        Short description text here
                    </p>

                    <form method=POST id="append_cart" class="flex flex-col gap-3 items-start">
                        <div class="flex border-1 border-black rounded-[5px] p-1">
                            <input type="button" name="decrease" value="-" class="w-5 m-0">
                            <input type="number" name="quantity" min="0" value="0" class="w-10 font-bold text-center [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"> <!-- XX. php insertion. Insert min and max of quantities from db -->
                            <input type="button" name="increase" value="+" class="w-5 m-0">
                        </div>
                        <input type="submit" name="to_basket" value="Add to Cart" class="text-white font-medium px-8 p-1.5 bg-orange-primary hover:opacity-90 rounded-[10px]"> <!-- POTENTIAL Add Buy Now-->
                    </form>

                    <div class="flex flex-col w-full bg-green-secondary p-5 text-white rounded-2xl">
                        <h4 class="font-medium"> Highlights </h4>
                        <ul class="list-disc pl-5">
                            <li> Feature 1 </li>
                            <li> Feature 2 </li>
                            <li> Feature 3 </li>
                        </ul>
                    </div>
                    <!-- POTENTIAL Aside links to skip to reviews area -->
                </section>
            </div>
            

            <section class="m-5">
                <h2 class="text-3xl font-bold text-green-secondary"> FULL DESCRIPTION </h2>
                <p class="text-center font-medium leading-relaxed"> [Long product description] </p> <!-- TODO  Ensure it doesnt take up 100% screen width. Add read more -->
            </section>

            <div class="flex flex-col w-full h-6 items-center gap-4" >

                <hr class="mb-5 border-black border-[1.5px] w-[95%] h-[2px]">

                <!-- TODO They need to be a signed in user to make a review. Reload page after login/signup -->
                <section class="flex flex-col gap-2 items-center w-full p-5 pb-4 bg-green-secondary">
                    <h2 class=" text-white text-3xl font-bold"> WRITE A PRODUCT REVIEW </h2>

                    <div class="flex flex-col gap-2 items-start w-full">
                        <input form="product_review" placeholder="Title" name="title" class="w-full bg-white text-black placeholder-black p-1 pl-4 text-[20px] rounded-[5px]">
                        <label class="text-white font-medium" name="reviewdescription" > Share your experience with the product..</label>
                    </div>

                    <textarea form="product_review" name="reviewtextarea" style="resize: none;" placeholder="Share your experience with the product…" rows="3" class="bg-white shadow-xl border-2 border-beige-third rounded-[5px] text-black placeholder-stone-700 pl-1 w-full overflow-y-scroll" hidden></textarea>
                    
                    <form  method=POST id="product_review" class="flex flex-col w-full h-[30%] items-center gap-3 " hidden>

                        <div class="flex gap-1 items-center">
                            <label for="stars" class="font-bold text-white text-[20px]"> Your Rating: </label>
                            
                            <div class="flex" id="stars" >
                                <label>
                                    <input class="hidden" name="star_5" type="radio"/>
                                    <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                                </label>

                                <label>
                                    <input class="hidden" name="star_5" type="radio"/>
                                    <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                                </label>

                                <label>
                                    <input class="hidden" name="star_5" type="radio"/>
                                    <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/> 
                                </label>

                                <label>
                                    <input class="hidden" name="star_5" type="radio"/>
                                    <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                                </label>

                                <label>
                                    <input class="hidden" name="star_5" type="radio"/>
                                    <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                                </label>
                            </div>
                        </div>
                            
                    </form>
                    
                    <input form="product_review" type="button" class="p-1.5 px-6 rounded-[10px] bg-orange-primary text-white text-[18px] font-medium hover:opacity-90 " value="Submit Review">

                </section>
                
                <div class="flex flex-col gap-10 w-full items-center">
                    <hr class="mt-5 border-black border-[1.5px] w-[95%] h-[2px]">

                    <!-- TODO Say "no reviews" if there are none -->
                    <div class="flex flex-col items-center w-[95%] bg-beige-primary rounded-3xl pt-4 p-5">

                        <h2 class="text-3xl font-bold text-green-secondary"> CUSTOMER REVIEWS </h2>

                        <form class="flex w-full justify-end pr-5">
                            <select id="filters" class="text-center text-black bg-white p-1 border-3 border-green-secondary rounded-[10px]">
                                    <option selected hidden class="text-white">Sort By</option>
                                    <option name="recent" value="recent">Most Recent</option>
                                    <option name="oldest" value="oldest">Oldest Review</option>
                                    <option name="ratings" value="ratings">Ratings</option>
                            </select>
                        </form>

                        <section class="bg-white rounded-lg shadow-xl border w-[95%] mt-5 border-gray-200 p-5 text-black gap-2 flex flex-col">
                            <article id="article_1" class="flex gap-3 items-center w-full ">

                                <form class="flex items-center">
                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/>
                                    </label>
                                </form>

                                <p class="font-bold text-[18px]"> Username </p>

                                <p class="font-medium"> "Comments" </p>

                                <p class="flex w-full justify-end font-medium"> Date </p>
                                
                            </article>
                            <article id="article_2" class="flex gap-3 items-center w-full ">

                                <form class="flex items-center">
                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/> 
                                    </label>

                                    <label>
                                        <input class="hidden" name="star_5" type="radio" readonly/>
                                        <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_selected3.png')}}"/>
                                    </label>
                                </form>

                                <p class="font-bold text-[18px]"> Username </p>

                                <p class="font-medium"> "Comments" </p>

                                <p class="flex w-full justify-end font-medium"> Date </p>
                                
                            </article>
                        </section>
                    </div>
                </div>
            </div> <!-- TODO Increase height of page dynamically based on articles displayed -->
        </main>

        <footer class="flex justify-between items-center h-12 w-full p-3 bg-green-primary dark:bg-black top-[100%]">
            <img src="{{ asset('/images/logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/> <!-- Logo -->

            <nav> <!-- Navigation -->
                 <ul class="flex gap-2.5 font-bold text-white" > <!-- AT END. Insert href links -->
                    <li><a class=" hover:text-beige-third" href="x">About </a></li>
                    <li><a class=" hover:text-beige-third" href="x">Contact</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Policies</a></li>
                </ul>
            </nav>
        </footer>

        <div id="starconfig" data-star="{{ asset('images/star_selected3.png') }}" hidden></div>
        <div id="placeholderconfig" data-star="{{ asset('images/placeholder5.png') }}" hidden></div>
        <div id="closeconfig" data-star="{{ asset('images/x-mark.png') }}" hidden></div>

    </body>
</html>

<!--Future:
    login_form

filter_reviews_form

newsletter_signup_form  -->