# PictYours


PictYours is a web application built using the Laravel framework for image sharing. It allows users to upload, share, and interact with photos and videos, offering an experience similar to Instagram.


## Features

PictYours comes packed with a wide range of features to enhance your photo-sharing experience:

- **User Account Creation:** Sign up and create your personalized PictYours account to start sharing your visual creations.

- **User Authentication:** Log in securely to your account to access all the platform's features.

- **Discover Recent Posts:** Browse through the latest posts shared by the PictYours community.

- **Explore Post Details:** Dive deeper into any post to view details, likes, and more.

- **User Profile Viewing:** Visit user profiles to see their shared posts and get to know them better.

- **Like Photos:** Show your appreciation by liking the photos that inspire you.

- **View Liked Photos:** Easily access all the photos you've liked in one place.

- **User Search:** Find other users by their name or username to connect and engage with them.

- **Follow users:** Follow users that you like

- **View Followed Users:** Easily access all the users you've followed in one place.


## Installation

To run PictYours locally using Laravel, follow these steps:

1. Clone the repository:

   ```
   git clone https://github.com/ThomasWILHEM/PictYours-On-Web.git
   ```

2. Run Docker Compose to setup the database:

   ```
   docker compose up -d
   ```

3. Install the required dependencies:

   ```
   composer install
   ```

4. Copy the `.env.example` file and rename it to `.env`.


6. Run migrations to create the database structure:

   ```
   php artisan migrate
   ```

7. Populate the database with the seeder:

   ```
   php artisan migrate:refresh --seed
   ```

8. Access PictYours in your web browser at [http://localhost:8000](http://localhost:8000).