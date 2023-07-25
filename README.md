## Steps to run

-   clone .env.example and save as .env file
-   composer install
-   npm install && npm run dev
-   php artisan serve(in another tab)

## Development journey

For this test, I needed to work on two different parts - backend API and frontend UI. At first, I thought that I needed to go for Laravel version 7 because that's where we used to create API endpoints from controllers and hit it from VueJS. My plan was:

-   To install Laravel version 7
-   To install laravel/ui:^2.4 and do php artisan ui vue

But that didn't work out when my local PHP version stays at 8.1.19. I thought that I couldn't go for Laravel version 10 with laravel/ui because they've modified it with Livewire and InertiaJS. I still gave it a shot and made it work - version 10 and laravel/ui package.

After that, I've worked on creating an API endpoint first but at the same time, I didn't know the logic to calculate the insulation. I was browsing for a while but eventually, I decided to worship the AI God and asked the calculation formula. Because I'm sure that this is not about finding the formula but working on the web development.

With the formula, it was easy to set up the controller function and tested it with POSTMAN. I did spend some time to add validations inside the controller but it was unnecessary. I faced controller import error inside API route file but I solved it and moved on. I can hand out the laravel.log file for details if you would like to examine my novice style errors.

I thought about using Tailwind but I was not confident enough to choose it for responsive design(I do like to work with it more to build up my courage). Just for the calculation form, I could use it and make it responsive but I'm back with good old Bootstrap this time.

Build up the form, made it render on initial call, connected with the API endpoint and got the result. I wanted to make the design a little bit more appealing and hence, tried to change the font style plus overall design. I made four inputs as number type and one input as select box. A little weird with the browser design but I thought that this is a lot better than normal inputs.

Couldn't make it work for the font style changes at first but I got it at the end and used Poppins font. Got confused a little bit when initial installation comes with Tailwind CDN and UI with Tailwind classes. Bootstrap was already there from the start and I was able to use it successfully.

Wanted to add validations on frontend and decided to use vee-validate. Created a global validator to remove repititive validation logics.

Showed the calculation result at the bottom of the form and made it disappear after 4 seconds rather than leaving it all the time.
