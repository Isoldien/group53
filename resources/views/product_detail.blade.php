<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Details</title>
        @vite(['resources/css/app.css','resources/css/product_detail.css','resources/js/product_detail.js'])
        
    </head>
    <body class="bg-white flex flex-col h-full">

        <header class="flex justify-between items-center h-12 w-full p-3 bg-green-primary dark:bg-black ">

            <!-- Logo -->
            <div class="flex gap-2 items-center text-white font-bold">
                <img src="{{ asset('/images/Logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/>
                <p> YOUZOO </p>
            </div>

            <!-- Navigation -->
            <nav>
                <ul class="flex gap-2.5 font-bold text-white" > <!-- TODO. Insert href links -->
                    <li><a class=" hover:text-beige-third" href="x">Home</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Shop</a></li>
                    <li><a class=" hover:text-beige-third" href="x">About</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Contact</a></li>
                    <li><a name="cart1" class=" hover:text-beige-third" href="/cart_checkout">Cart</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Login</a></li>
                </ul>
            </nav>
        </header>

        <!-- Menu Tab for small screens -->
        <div id="menu" class="mt-12 w-[20%] flex flex-col items-center p-5 bg-green-primary text-white fixed right-0" hidden>
            <nav>
                <ul class="flex w-full h-full flex-col gap-2.5 font-bold text-white" > <!-- TODO. Insert href links -->
                    <li><a class=" hover:text-beige-third" href="x">Home</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Shop</a></li>
                    <li><a class=" hover:text-beige-third" href="x">About</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Contact</a></li>
                    <li><a name="cart2" class=" hover:text-beige-third" href="/cart_checkout">Cart</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Login</a></li>
                </ul>
            </nav>
        </div>

        <main class="flex flex-col items-center w-full gap-5 flex-1">

            <div class="flex flex-col items-center">
                <!-- Product Header -->
                <h1 class="font-bold text-5xl text-green-secondary mt-5 text-center">Product Name Here</h1> <!-- PHP insertion. Include name of product -->
                
                <!-- Secondary Navigation -->
                <nav>
                    <ul class="flex mb-5 font-bold text-black items-center" > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Home</a></li>
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Shop</a></li>
                        <li><a class="hover:text-orange-primary " href="x">Category</a></li>
                    </ul>
                </nav>

            </div>

            <div class="flex w-[95%] mb-5 gap-3 max-sm:flex-wrap">

                <!-- Product Image -->
                <img class="w-[50%] h-full rounded-2xl max-sm:w-full max-sm:h-[50%]" src="{{asset('images/placeholder1.png')}}" alt="product image"/> <!-- PHP insertion. Include image of product, set src and alt attributes -->

                <!-- Product Details -->
                <section class="flex flex-col w-[50%] max-h-full max-sm:w-full gap-3 p-5 bg-beige-primary rounded-3xl">
                    <h3 class="text-2xl font-bold text-green-secondary"> Product Title </h2> <!-- PHP insertion. Include title of product -->

                    <p class="font-bold text-2xl text-green-secondary"> £ Price </p> <!-- PHP insertion. Include price of product -->
                    
                    <p class=" w-[90%] text-gray-900"> <!-- PHP insertion. Include short description of product [TODO: read more button is activated if the text is longer than 100 characters] -->
                        Short description text here
                    </p>

                    <form method=POST id="append_cart" class="flex flex-col gap-3 items-start">
                        <div class="flex border-1 border-black rounded-[5px] p-1">
                            <input type="button" name="decrease" value="-" class="w-5 m-0">
                            <input type="number" name="quantity" min="0" value="0" class="w-10 font-bold text-center [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"> <!-- PHP insertion. Dynamically change the max quantity of the product [available items should decrease if added to cart (even if not bought yet) ] -->
                            <input type="button" name="increase" value="+" class="w-5 m-0">
                        </div>
                        <input type="submit" name="to_basket" value="Add to Cart" class="text-white font-medium px-8 p-1.5 bg-orange-primary hover:opacity-90 rounded-[10px]">
                    </form>

                    <div class="flex flex-col w-full bg-green-secondary p-5 text-white rounded-2xl">
                        <h4 class="font-medium"> Highlights </h4>
                        <ul class="list-disc pl-5"> <!-- PHP insertion. Include highlights of product -->
                            <li> Feature 1 </li>
                            <li> Feature 2 </li>
                            <li> Feature 3 </li>
                        </ul>
                    </div>
                </section>
            </div>
            
            <!-- Product Details Part 2 -->
            <section class="m-5">
                <h2 class="text-3xl font-bold text-green-secondary"> FULL DESCRIPTION </h2>
                <p class="text-center font-medium leading-relaxed"> [Long product description] </p> <!-- PHP insertion. Include long description of product [TODO. read more button will be displayed if text is longer than 300 characters] -->
            </section>
            
            <hr class="mb-5 border-black border-[1.5px] w-[95%] h-[2px]">

            <!-- Create Review -->
            <section class="flex flex-col gap-2 items-center w-full p-5 pb-4 bg-green-secondary"> <!-- TODO They need to be a signed in user to make a review. Reload page after login/signup. Generate new comment -->
                <h2 class=" text-white text-3xl font-bold text-center"> WRITE A PRODUCT REVIEW </h2>

                <div class="flex flex-col gap-2 items-start w-full">
                    <input form="product_review" placeholder="Title" name="title" class="w-full bg-white text-black placeholder-black p-1 pl-4 text-[20px] rounded-[5px]" required>
                    <label class="text-white font-medium" name="reviewdescription" > Share your experience with the product..</label>
                </div>

                <textarea form="product_review" name="reviewtextarea" style="resize: none;" placeholder="Share your experience with the product…" rows="3" class="bg-white shadow-xl border-2 border-beige-third rounded-[5px] text-black placeholder-stone-700 pl-1 w-full overflow-y-scroll" hidden required></textarea>
                
                <form id="product_review" class="flex flex-col w-full h-[30%] items-center gap-3 " hidden>

                    <div class="flex gap-1 items-center">
                        <label for="stars" class="font-bold text-white text-[20px]"> Your Rating: </label>
                        
                        <div class="flex flex-row" id="stars" >
                            <label>
                                <input class="hidden" name="star_1" type="radio"/>
                                <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                            </label>

                            <label>
                                <input class="hidden" name="star_2" type="radio"/>
                                <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                            </label>

                            <label>
                                <input class="hidden" name="star_3" type="radio"/>
                                <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/> 
                            </label>

                            <label>
                                <input class="hidden" name="star_4" type="radio"/>
                                <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                            </label>

                            <label>
                                <input class="hidden" name="star_5" type="radio"/>
                                <img class="w-10 h-auto bg-transparent hover:opacity-80" src="{{asset('images/star_unselected.png')}}"/>
                            </label>
                        </div>
                    </div>
                        
                </form>
                
                <input form="product_review" type="submit" class="p-1.5 px-6 rounded-[10px] bg-orange-primary text-white text-[18px] font-medium hover:opacity-90 " value="Submit Review"> <!-- TODO. Send error if button is clicked with fields empty --> <!-- PHP insertion. Send review info of form to db when button clicked -->

            </section>
                
            <hr class="mt-5 border-black border-[1.5px] w-[95%] h-[2px]">

            <!-- All Reviews -->
            <div class="flex mt-5 flex-col items-center w-[95%] bg-beige-primary rounded-3xl pt-4 p-5"> <!-- TODO Say "no reviews" if there are none -->

                <h2 class="text-3xl font-bold text-green-secondary"> CUSTOMER REVIEWS </h2>

                <!-- Sort By/Filters Feature -->
                <form class="flex w-full justify-end pr-5"> 
                    <select id="filters" class="text-center text-black bg-white p-1 border-3 border-green-secondary rounded-[10px]">
                            <option selected hidden class="text-white">Sort By</option>
                            <option name="recent" value="recent">Most Recent</option>
                            <option name="oldest" value="oldest">Oldest Review</option>
                            <option name="ratings" value="ratings">Ratings</option>
                    </select>
                </form>

                <!-- List of Reviews -->
                <section id="reviewarticles" class="bg-white rounded-lg shadow-xl border w-[95%] mt-5 border-gray-200 p-5 text-black gap-2 flex flex-col"> <!-- PHP Insertion. Display Customer Reviews from db and use js to create new article -->
                    <!-- If there are no reviews display this -->
                    <p id="noreviews"> There are no reviews </p>
                </section>
            </div>
        </main>

        <footer class="flex items-center h-12 w-full mt-10 bg-green-primary dark:bg-black px-4">
            
            <!-- Logo -->
            <div id="logofooter" class="flex gap-2 items-center justify-start text-white font-bold w-[calc(100%/3)]">
                <img src="{{ asset('/images/Logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/> <!-- Logo -->
                <p> YOUZOO </p>
            </div>

            <!-- Links Navigation -->
            <div id="linksfooter" class="font-bold justify-center items-center text-white flex gap-2 w-[calc(100%/3)]">
                <p> [Links: </p>

                <nav>
                    <ul class="flex gap-1 w-full " > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">About </a></li>
                        <li><a class="after:content-['\|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Contact</a></li>
                        <li><a class="after:content-['\]'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Policies</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Newspaper Signup Navigation -->
            <div id="newsfooter" class="font-bold text-white items-center justify-end flex gap-2 w-[calc(100%/3)]">
                <p> [Newspaper Signup: </p>

                <nav>
                    <a class=" hover:text-orange-primary after:content-['\]'] hover:after:text-white" href="x">Subscribe</a>  <!-- TODO. Insert href links -->
                </nav>
            </div>
        </footer>

        <!-- Image assets used in js -->
        <div id="selectedstarconfig" data-star="{{ asset('images/star_selected3.png') }}" hidden></div>
        <div id="unselectedstarconfig" data-star="{{ asset('images/star_unselected.png') }}" hidden></div>
        <div id="placeholderconfig" data-star="{{ asset('images/placeholder5.png') }}" hidden></div>
        <div id="closeconfig" data-star="{{ asset('images/x-mark.png') }}" hidden></div>
        <div id="menuconfig" data-star="{{ asset('images/menu1.png') }}" hidden></div>

    </body>
</html>