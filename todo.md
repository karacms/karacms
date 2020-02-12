# Dashboard
    - Move main menu to setting to allow users register menu

# Users and Roles
    - Search and filter
    - Login As
    - Hit Update on Update profile doesn't update avatar because it's located in other form. Maybe change the style
    - User Attributes
    - User Permissions
    - User with lower role cannot create user with higher role
    - Store all uploaded files path in users media table

# Media
    - Handle Uppy upload

# Settings
    - Allow register
    - Default Role

# Content Types
    - Post
    - Style for editorjs

# Custom Fields    
    - Repeater Field
    - File
    - Uppy
    - Use Bootstrap Collapse instead of create our own. We will replace later
    
    - Next phrase: Conditional Logic
    - Next Phrase: Allow users create their own field
    - Get Default value from Form (currently, from DB until it inserted)
    - Access field parent by $field->parent helper
    - Access next, previous field by $field->next, $field->previous, $field->siblings helper

# Authentication views
    - Styling

# Extensions
    - Payment
    - Booking
    - Forms
    - EduOne
    - Shop
    - Login As

# Social Login
    - Facebook
    - Google

# Installation Script
    - Create symlink for storage

# Bugs
    - Datetime-local Safari, Firefox: Use polyfill
    - Add these deps back:

```
        "@uppy/core": "1.8.0",
        "@uppy/dashboard": "1.6.0",
        "@uppy/drag-drop": "1.4.3",
        "@uppy/file-input": "1.4.3",
        "@uppy/informer": "1.4.0",
        "@uppy/progress-bar": "1.3.5",
        "@uppy/provider-views": "1.5.3",
        "@uppy/store-default": "1.2.0",
        "@uppy/tus": "1.5.3",
        "@uppy/utils": "2.2.0",
        "@uppy/xhr-upload": "1.5.0",
```
- Remove submit-prevent saveContent()
