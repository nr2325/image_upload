# Image Upload Task Instructions

This task involves building a simple Laravel feature for image uploading. You will complete the controller, database, and model setup. Your goal is to store uploaded images, save their information to a database, and display them in the provided Blade file.

## Task Requirements

1. **Controller**:  
   Create a controller to handle the image upload process, saving image details to the database and fetching images for display.

2. **Database**:
    - Set up a database table to store image details.
    - Each image entry should include:
        - `id` (auto-incremented primary key)
        - `filepath` (string)
3. **Model**:  
   Create a model to interact with the database table.

4. **Functionality**:
    - When an image is uploaded, save it to the `/public/images` directory.
    - Store the image filepath.
    - Fetch and display all uploaded images in the provided Blade file using the table format.

## Steps

### 1. Database Setup

-   **Migration**: Create a migration for an `images` table with columns for `id`, `filepath`.
    -   Run the migration to create the table in your database.

### 2. Model Creation

-   Create a model (e.g., `Image`) linked to the `images` table.

### 3. Controller Setup

-   Create a controller (e.g., `ImageController`) to handle:
    -   **Image Upload**: Process the uploaded file, move it to `/public/images`, and save the file information in the database.
    -   **Display Images**: Fetch all image entries from the database and pass them to the Blade view for display.

### 5. Testing

-   Verify that the upload and display functionality works as expected.
-   Check that images are saved to `/public/images` and that all uploaded images appear in the table with their file name

---

## Example Workflow

1. **Upload Image**:
    - Go to the upload page.
    - Select an image and submit.
2. **Display Uploaded Images**:
    - After upload, the image details should appear in the table on the page.

---

## Additional Notes

-   **File Upload Validation**: Add basic validation in the controller for the file type (e.g., `jpeg`, `png`) and size (max 2MB).
-   **Image Path**: Ensure images are correctly displayed by using the `asset()` helper function in the Blade file to generate the image path.
