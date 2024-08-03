# Simple Image Gallery
A fully functional image gallery with upload capabilities using PHP, HTML, jQuery, AJAX, JSON, Bootstrap, CSS, and MySQL. This project includes a detailed step-by-step solution with code explanations and documentation, making it a comprehensive tutorial for learning.

**Topics:** `php`, `mysql`, `blog`, `ajax`, `bootstrap`, `jquery`, `css`, `image gallery`, `file upload`

![simple-weather-app](./assets/images/simple-blog-platform.png)

### Install Process

1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/simple-image-gallery.git
   ```

2. **Navigate to the project directory:**
   ```sh
   cd simple-image-gallery
   ```

3. **Set up the database:**
   - Create a MySQL database named `image_gallery`.
   - Import the provided SQL file to create the necessary table:
     ```sh
     mysql -u yourusername -p image_gallery < db/database.sql
     ```

4. **Update the database configuration:**
   - Copy `config.sample.php` to `config.php`:
      ```sh
      cp config.sample.php config.php
      ```
   - Open `config.php` and update the database configuration details.

5. **Directory Permission:**
   - If you encounter permission issues, you might need to set more permissive permissions, such as chmod 777, which grants read, write, and execute permissions to everyone:
      ```sh
      chmod 777 assets/uploads
      ```
   - Open `config.php` and update the database configuration details.

6. **Start the development server:**
   ```sh
   php -S localhost:8000
   ```

7. **Access the application:**
   - Open your web browser and navigate to `http://localhost:8000`.


### File Structure

Here’s a basic file structure for your simple-image-gallery application:

```
simple-image-gallery/
│
├── index.html
├── db/
│   └── database.sql
├── src/
│   ├── fetch-image.php
│   └── upload.php
├── include/
│   ├── config.sample.php
│   └── db.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── uploads/
│   │   └── (uploaded images will be stored here)
├── README.md
└── .gitignore
```