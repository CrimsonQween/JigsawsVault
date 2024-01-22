The Killers Vault Web Application is a platform dedicated to horror movie memorabilia. 
---
# About Us Section
- Introduction to Killers Vault, its mission, and diverse collection.
---
# Admin Dashboard
- Quick access for administrators to manage products, orders, and users.
  - **Product Management:** Add, edit, and delete products.
  - **Order Management:** View and update customer orders.
  - **User Management:** View, edit, and delete user accounts.
---
# Checkout Page
- PHP script for processing orders with features like order summary, country selection, and payment.

#### Prerequisites
- PHP server with session support.
- Configured database tables.

#### Setup
1. Copy contents to the server.
2. Set up a database and configure credentials.
3. Import the database schema.
4. Configure header and footer files.

#### Usage
1. Access the checkout page.
2. Select country, city, and street.
3. Enter house number.
4. Provide payment information.
5. Review order summary.
6. Click "Place Order."

#### Files
- `index.php`: Main checkout page script.
- `DB\db.php`: Database configuration.
- `DB\dbfunctions.php`: Database functions.
- `process_order.php`: Script for processing orders.
- `includes/header.php` and `includes/footer.php`: Header and footer sections.
---
# Contact Page
- PHP script for a simple contact form with basic validation.

#### Requirements
- PHP server.
- CSS styles in `style.css`.

#### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure header and footer files.
4. Ensure proper linking of `style.css`.

#### Usage
1. Access the contact form.
2. Fill in Name, Email, and Message.
3. Click "Submit."

#### Files
- `index.php`: Main contact form script.
- `submitcontact.php`: Script to process and submit the form.
- `style.css`: CSS file for styling.

### Fan Gallery
- PHP script displaying a fan gallery with images in a lightbox.

#### Requirements
- PHP server.
- Lightbox library for image viewing.

#### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Link `style.css` for styling.
4. Include Lightbox library scripts.

#### Usage
1. Access the fan gallery.
2. View fan images in the wall.
3. Click an image to view in a lightbox.

#### Files
- `index.php`: Main fan gallery script.
- `style.css`: CSS file for styling.
- `lightbox\lightbox-plus-jquery.js` and `lightbox\lightbox.css`: Lightbox library scripts.
---
# Home Page
- PHP script for a movie merchandise website with Bootstrap carousel and featured products.

#### Requirements
- PHP server.
- Bootstrap for styling.
- Database with movie product information.

#### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure header and footer files.
4. Link `style.css` and Bootstrap styles.

#### Usage
1. Access the website.
2. Explore featured movie posters and products.
3. Click "View Details" for more information.

#### Files
- `index.php`: Main page script.
- `DB\db.php` and `DB\dbfunctions.php`: Database configuration and functions.
- `style.css`: CSS file for styling.
- `includes/header.php` and `includes/footer.php`: Header and footer sections.
- `product.php`: Script for displaying product details.

---
# Login Page
The Login Page PHP script allows users to log in with a username and password. Here's a simplified breakdown:

### Requirements
- PHP server
- Database with user information
- Styles defined in `style.css`

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure header and footer files.
4. Link `style.css` for styling.
5. Ensure database and `DB\db.php` are configured.
6. Create a registration page (`register.php`) for user registration.

### Usage
1. Access the login page.
2. Enter username and password.
3. Click "Login" to log in.
4. Display error message on login failure.
5. New users can register by clicking "Sign up here."

### Files
- `index.php`: Main login page script.
- `DB\db.php`: Database configuration.
- `DB\dbfunctions.php`: Database functions.
- `style.css`: CSS file.
- `process_login.php`: Script for processing login.
- `includes/header.php` and `includes/footer.php`: Header and footer.
- `register.php`: Registration page.

---
# Product Review Submission
The Product Review Submission PHP script handles user-submitted reviews. A simplified breakdown:

### Requirements
- PHP server
- Database with product and user info
- `DB\dbfunctions.php` with database functions
- `DB\db.php` for database configuration

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php` and `DB\dbfunctions.php`.
4. Ensure user authentication is implemented.

### Usage
1. Ensure users are logged in.
2. Access the product page.
3. Submit a review through the form.
4. Insert review into the database.

### Files
- `submit_review.php`: Main script for submitting reviews.
- `DB\dbfunctions.php`: Database functions.
- `DB\db.php`: Database configuration.
- `product.php`: Product page with the review form.

---
# User Authentication
User Authentication PHP script manages logins and redirects based on user roles:

### Requirements
- PHP server
- Database with user info
- `DB\db.php` for database configuration
- `DB\dbfunctions.php` for user verification
- `login.php` with the login form

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php` and `DB\dbfunctions.php`.
4. Create a login page (`login.php`).

### Usage
1. Access the login page.
2. Enter username and password.
3. Redirect to admin/user page on success.
4. Redirect to login page on failure.

### Files
- `login_process.php`: Main script for login processing.
- `DB\db.php`: Database configuration.
- `DB\dbfunctions.php`: Database functions.
- `admin_dashboard.php`: Admin dashboard.
- `home.php`: User account.
- `login.php`: Login page.

---
# Order Processing
The Order Processing PHP script processes customer orders. A simplified breakdown:

### Requirements
- PHP server
- Database with order-related tables
- `DB\db.php` for database configuration
- `DB\dbfunctions.php` for order-related functions
- `thank_you_order.php` for order confirmation

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php` and `DB\dbfunctions.php`.
4. Create a form for billing and shipping.
5. Create a thank you/order confirmation page.

### Usage
1. Customers fill out the form.
2. Process the order and store details.
3. Clear the shopping cart.
4. Redirect to thank you/order confirmation.

### Files
- `process_order.php`: Main script for order processing.
- `DB\db.php`: Database configuration.
- `DB\dbfunctions.php`: Database functions.
- `thank_you_order.php`: Thank you/order confirmation page.
- `home.php`: Example home page.

---
### Product Addition
Product Addition PHP script adds new products to the database:

### Requirements
- PHP server
- Database with a `products` table
- `DB\db.php` for database configuration
- `adminproduct.php` for admin product management

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php`.
4. Create an admin product management page.

### Usage
1. Access the admin product management page.
2. Fill out the form with new product details.
3. Submit to add to the database.
4. Show alert on success; redirect on error.

### Files
- `add_product.php`: Main script for adding a product.
- `DB\db.php`: Database configuration.
- `adminproduct.php`: Admin product management.
- Other files for tables and form submission.

---
### User Registration
User Registration PHP script handles user registration:

### Requirements
- PHP server
- Database with a `users` table
- `DB\db.php` for database configuration
- `login.php` for redirection after registration

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php`.
4. Create a registration page (`registration.php`).

### Usage
1. Access the registration page.
2. Fill out the form with required details.
3. Redirect to login on success; display error on failure.

### Files
- `register.php`: Main script for user registration.
- `DB\db.php`: Database configuration.
- `login.php`: Login page for redirection.
- Other files for tables and form submission.

---
### Wishlist Management
Wishlist Management PHP script handles adding products to a user's wishlist:

### Requirements
- PHP server
- Database with a `wishlist` table
- `DB\db.php` for database configuration
- `DB\dbfunctions.php` for wishlist functions
- `login.php` for redirecting users if not logged in
- `product.php` for redirecting users back to the product page

### Setup
1. Copy contents to the server.
2. Set up a web server.
3. Configure `DB\db.php`.
4. Implement user authentication.
5. Create a product page (`product.php`).
6. Optionally, create a login page (`login.php`).

### Usage
1. Access a product page.
2. Show alert and redirect if not logged in.
3. Redirect with flag on existing wishlist item.
4. Add to wishlist and redirect with success flag.

### Files
- `add_to_wishlist.php`: Main script for adding to wishlist.
- `DB\db.php`: Database configuration.
- `DB\dbfunctions.php`: Database functions.
- `login.php`: Login page for users not logged in.
- `product.php`: Product page for redirection.
- Other files for tables and authentication.
---

# Product Details

This section provides detailed information about a product.

- **Image Section:** Displays the product image with a rounded border and a maximum height of 300 pixels.

- **Product Information:** Includes the product name, price, and a brief description.

- **Add to Cart Button:** Offers a button to add the product to the cart.

---

# Product Details Page

This section offers detailed information about a specific product, including its image, name, price, description, and customer reviews.

- **Product Image Section:** Displays the product image responsively.

- **Product Information Section:** Contains the product name, price, and a description.

- **Add to Cart Section:** Allows users to add the product to their shopping cart.

- **Add to Wishlist Section:** Allows users to add the product to their wishlist.

- **Product Reviews Section:**
  - Displays existing reviews, including user, rating, and comments.
  - Provides a form for users to add their own reviews, including a rating and comments.

---

# Product Listing Page

This page exhibits a list of products based on the selected category, allowing users to navigate through different product categories and view details for each product.

- **Product Category Header:** Displays the selected category prominently.

- **Product List Section:** Presents a grid of product cards, each containing:
  - Product image
  - Product name
  - Product price
  - "View Details" button to navigate to the individual product details page.

---

# User Registration Page

This page enables users to sign up for an account, providing their desired username, email, and password. Users can optionally sign up as an admin.

- **Sign-Up Form:**
  - Username, Email, Password fields.
  - Admin Checkbox for optional admin sign-up.
  - Submit Button for form submission.

- **Confirmation Message:**
  - Displays a confirmation message upon successful registration, thanking the user and providing their username and email.

- **Login Redirect:**
  - Includes a link to the login page for existing users.

---

# Wishlist Item Removal

This PHP script manages the removal of a product from the user's wishlist, assuming the session is active, and necessary database and function files are included.

1. **Session Start:** Initiates the session to access and manipulate session variables.

2. **Database Connection:** Connects to the database using `DB\db.php`.

3. **Function Inclusion:** Includes `DB\dbfunctions.php` for wishlist management functions.

4. **POST Request Handling:** Checks for a valid POST request and the presence of `productId`.

5. **Remove from Wishlist:** Utilizes the `removeItemFromWishlist` function to remove the product, echoing a success message and redirecting to the wishlist on success.

6. **Error Handling:** Echoes an error message if the removal process encounters an issue.

7. **Invalid Request:** Echoes an "Invalid request" message for incomplete or incorrect requests.

---

# Shopping Cart Management

This PHP script handles the user's shopping cart, allowing users to add and remove items, view cart contents, and providing an order summary.

1. **Session Start:** Initiates the session to access and manipulate session variables.

2. **Header Inclusion:** Includes the header file (`includes/header.php`) for consistent styling.

3. **Database Connection and Function Inclusion:** Connects to the database (`DB\db.php`) and includes functions (`DB\dbfunctions.php`).

4. **POST Request Handling:** Manages POST requests for adding and removing items from the cart.

5. **Get Cart Contents:** Retrieves the current cart contents using `getCartContents` function.

6. **Display Cart Contents:** Displays a table with product details, quantity, total price, and a remove button for each item if the cart is not empty.

7. **Order Summary:** Calculates and displays the order summary, including subtotal, tax, shipping cost, and total.

8. **Checkout Link:** Provides a link to proceed to checkout with relevant order details.

9. **Footer Inclusion:** Includes the footer file (`includes/footer.php`) for consistent styling.

---

# Contact Form Submission

This PHP script handles the submission of a contact form, securely inserting form data into a database using prepared statements. Upon success, it redirects to a "thank you" page; otherwise, it displays an error message.

1. **Database Connection:** Connects to the database (`DB\db.php`).

2. **Form Data Retrieval:** Retrieves form data securely from the POST request.

3. **Prepared Statements:** Uses prepared statements to prevent SQL injection vulnerabilities.

4. **Statement Binding:** Binds form data to prepared statement parameters.

5. **Execution:** Executes the prepared statement and redirects to a "thank you" page on success.

6. **Database Connection Closure:** Closes the database connection.

7. **Redirection/Error Handling:** Redirects to a "thank you" page on success; otherwise, displays an error message.

---

# Order Confirmation Page 

This PHP script generates a thank-you page to acknowledge a successfully placed order on a website.

1. **Header Inclusion:** Includes the header file (`includes/header.php`) for consistent styling.

2. **Page Content:** Encloses the page content in a container within a section for proper styling.

---
# Thank You for Contacting Us Page

This PHP script generates a thank you page to acknowledge the successful submission of a contact form on a website.

## Logic

### Header Inclusion:

The script includes the header file (`includes/header.php`) to maintain consistent styling.

### Page Content:

The content of the page is enclosed in the standard HTML structure.

### Meta Information:

The HTML head includes meta tags for character set and viewport settings.

### Title:

The title of the page is set to "Thank You."

### Body:

The body of the HTML document contains PHP logic to retrieve the submitted name from the contact form. If the name is not provided, a default value of 'Guest' is used.

### Heading:

A prominent heading (`h1`) displays the personalized message "Thank You, [Name]!" where [Name] is either the submitted name or 'Guest.'

### Confirmation Message:

A paragraph (`p`) expresses appreciation for the contact form submission and assures the user that a response will be provided soon.

### Footer Inclusion:

The script includes the footer file (`includes/footer.php`) to maintain a unified look and feel.

This script creates a user-friendly thank you page with a personalized greeting based on the submitted name, enhancing the overall user experience.

---

* Update Order Status

This PHP script manages the update of order status by an admin on a website.

**Logic:**

1. **Session Start:**
   - Starts a session to access and manipulate session variables.

2. **Database Connection and Function Inclusion:**
   - Includes the database connection file (`DB\db.php`) and the functions file (`DB\dbfunctions.php`) for relevant functions.

3. **Update Status Form Submission Check:**
   - Processes the update if the order status update form is submitted (`isset($_POST['update_status']`)).

4. **Retrieve Form Data:**
   - Retrieves order_id and the selected new_status from the submitted form.

5. **Update Order Status:**
   - Calls `updateOrderStatus` function to update the order status in the database.

6. **Redirect:**
   - After updating, redirects the admin to the adminmanageorders.php page.

7. **Header and Footer Inclusion:**
   - Includes the header file (`includes/header.php`) and the footer file (`includes/footer.php`) for consistent layout.

This script provides a simple way for administrators to efficiently update order statuses.

---

* User Role Update

This PHP script handles the update of a user's role by an administrator on the website.

**Logic:**

1. **Session Start:**
   - Starts a session to access and manipulate session variables.

2. **Database Connection and Function Inclusion:**
   - Includes the database connection file (`DB\db.php`) and the functions file (`DB\dbfunctions.php`) for relevant functions.

3. **Admin Authentication:**
   - Checks if the user is logged in and has administrator privileges; redirects to the login page if not.

4. **Form Submission Check:**
   - Checks if the form is submitted (`$_SERVER["REQUEST_METHOD"] == "POST"`).

5. **Retrieve Form Data:**
   - Retrieves `user_id` and `role` from the submitted form.

6. **Update User Role:**
   - Calls `editUser` function to update the user's role in the database.

7. **Display Result:**
   - Displays a message indicating success or error in updating the user's role.

8. **Redirect:**
   - If successful, redirects to the admin dashboard (`admin_dashboard.php`).

This script ensures that only authenticated administrators can update user roles securely.

---

* My Wishlist Page

This PHP script generates a page displaying the user's wishlist with product images, names, prices, and a remove button for each item.

**Logic:**

1. **Session Start:**
   - Checks the session status; starts one if not started to access session variables.

2. **Database Connection and Function Inclusion:**
   - Includes the database connection file (`DB\db.php`) and the functions file (`DB\dbfunctions.php`) for relevant functions.

3. **Retrieve Wishlist:**
   - Retrieves the user's wishlist using `getUserWishlist` function based on the user's ID.

4. **Page Structure:**
   - HTML structure with standard declarations, language attributes, meta tags, title, and a link to an external stylesheet (`style.css`).

5. **Display Wishlist:**
   - Uses a loop to iterate through wishlist items, displaying product image, name, price, and a form with a remove button for each.

6. **Styling:**
   - Ensures consistent and visually appealing styling using the linked stylesheet (`style.css`).

7. **Remove Wishlist Item Form:**
   - Includes a form for each item with a hidden input for the product ID, allowing users to remove items by submitting the form to `remove_wishlist_item.php`.

8. **Footer Inclusion:**
   - Includes the footer file (`includes/footer.php`) for consistent styling.

This script offers users a clear view of their wishlist, enabling easy item management.

---

* Database Connection Configuration

This PHP script establishes a connection to a MySQL database with specific configuration details.

**Connection Logic:**

- Attempts to connect to the database using `mysqli_connect`.
- If successful, proceeds with the subsequent code; otherwise, terminates the script and displays a detailed error message.

**Database Connection Parameters:**

- **Server Name (`$serverName`):** localhost
- **Database Username (`$dbUsername`):** root
- **Database Password (`$dbPassword`):** (empty)
- **Database Name (`$dbName`):** killersvault

**Connection Error Handling:**

- Displays an error message using `die` if the connection fails, including details from `mysqli_connect_error()`.

This script serves as the initial step in connecting to the "killersvault" database, with details adjustable based on your MySQL server configuration.

---

* Database and Function Management

This PHP script includes functions for interacting with a MySQL database and managing various operations related to products, users, orders, and more.

**Database Connection:**

- Establishes a connection to a MySQL database with specific configuration details.

**Database Connection Function:**

- **Function Name:** `connectToDatabase`
- **Description:** Establishes a new MySQLi connection to the database and returns the connection object.

**Product-related Functions:**

1. **Get Products Function:**
   - Retrieves product information, optionally filtered by categories.

2. **Get Categories Function:**
   - Retrieves a list of product categories.

3. **Get Product Details Function:**
   - Retrieves detailed information about a specific product.

4. **Add to Cart Function:**
   - Adds a product to the user's shopping cart.

5. **Remove from Cart Function:**
   - Removes a specified product from the user's shopping cart.

6. **Get Cart Contents Function:**
   - Retrieves the current contents of the user's shopping cart.

7. **Get 3 Products Function:**
   - Retrieves information for a specified number of products.

8. **User Wishlist Functions:**
   - Retrieves the wishlist items for a user.
   - Removes a specified item from the user's wishlist.

**User-related Functions:**

1. **User Verification Function:**
   - Verifies user credentials against the database.

2. **Add User Function:**
   - Adds a new user to the database.

3. **Edit User Function:**
   - Updates the role of a user in the database.

4. **Delete User Function:**
   - Deletes a user from the database.

5. **Get Users Function:**
   - Retrieves a list of all users from the database.

6. **Get User Details Function:**
   - Retrieves detailed information about a specific user.

**Order-related Functions:**

1. **Get Orders Function:**
   - Retrieves order information, including customer name, product names, total, and status.

2. **Update Order Status Function:**
   - Updates the status of a specific order in the database.

3. **Cancel Order Function:**
   - Cancels an order by deleting related records.

4. **Review-related Functions:**
   - Retrieves reviews for a specific product.
   - Inserts a new review for a product.

**Miscellaneous Functions:**

1. **Insert Form Data Function:**
   - Inserts form data into the contact_form table.

2. **Get Countries Function:**
   - Retrieves a list of countries.

3. **Get Cities by Country Function:**
   - Retrieves cities based on the selected country.

4. **Get Streets by City Function:**
   - Retrieves streets based on the selected city.

5. **Render Dropdown Functions:

**
   - Renders HTML dropdown options for product categories and products.

6. **Handle Form Submission Function:**
   - Handles form submissions for product management operations.

7. **Render Edit-Delete Form Function:**
   - Renders an HTML form for editing or deleting a product.

