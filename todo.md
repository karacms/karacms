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
    - Login As - Working

- Add auto publish assets feature for activated plugin, when activated

# Social Login
    - Facebook
    - Google

# Installation Script
    - Create symlink for storage

# Bugs
    - Datetime-local Safari, Firefox: Use polyfill
    - Add these deps back:

# Editor
- Remove submit-prevent saveContent()

# Extension System
- Store activated extension as 
```
{
   extensionName: {
       status: 'activated'
       activatedAt: Date(),
       priority: 10,
       installedBy: User()
   },
   ...
}
```

- Extension Store
- Extension Priority