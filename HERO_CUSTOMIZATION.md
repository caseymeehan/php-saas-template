# Hero Section Customization Guide

## Overview
Your hero section now features a modern **two-column layout** inspired by Interior AI's design, with text content on the left and a signup card on the right.

## Current Design Features

### Layout Structure
✅ **Two-column grid layout** (text left, form right)  
✅ **Left-aligned content** for better readability  
✅ **White signup card** with form elements  
✅ **Green chat bubble** for urgency messaging  
✅ **Responsive design** - stacks on mobile devices  
✅ **Full-width background image** with dark overlay  
✅ **Modern gradient buttons**  
✅ **Google sign-in integration**

### Visual Components
- **Badge**: "#1 SaaS Solution" with laurel wreath and stars
- **Headline**: Large, bold, left-aligned with emoji
- **Benefits**: 3 bullet points with underlined links
- **Signup Card**: Email input + CTA button + Google button
- **Chat Bubble**: Green notification with urgency text

## Customizing Text Content

### Edit Badge Text
In `index.php` around line 69:
```html
<span class="badge-text">#1 SaaS Solution</span>
```
Change to match your product (e.g., "#1 AI Tool", "#1 Marketing App")

### Edit Headline
In `index.php` around line 82:
```html
<h1 class="hero-title">
    🚀 Transform Your Business
</h1>
```

### Edit Bullet Points
In `index.php` around lines 87-96:
```html
<div class="benefit">
    ✅ <a href="/features.php">Your benefit text</a> with description
</div>
```
**Tips**: 
- Keep it to 3 bullets for visual balance
- Use underlined links for key phrases
- Start with emojis for visual interest

### Edit Chat Bubble
In `index.php` around line 102:
```html
<div class="signup-bubble">
    ✨ Get your first results in less than a minute!
</div>
```

### Edit Form Elements
In `index.php` around lines 106-118:
- **Email placeholder**: Line 107
- **CTA button text**: Line 108
- **Hint text**: Line 118

## Customizing Colors

### Primary CTA Button (Orange/Coral Gradient)
Edit `assets/css/style.css` around line 394:
```css
.btn-cta {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #f06595 100%);
    /* Change these hex colors to your brand colors */
}
```

**Popular alternatives**:
- **Blue**: `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`
- **Green**: `linear-gradient(135deg, #11998e 0%, #38ef7d 100%)`
- **Purple**: `linear-gradient(135deg, #a855f7 0%, #ec4899 100%)`
- **Orange**: `linear-gradient(135deg, #fa709a 0%, #fee140 100%)`

### Chat Bubble Color
Edit `assets/css/style.css` around line 332:
```css
.signup-bubble {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    /* Change to your accent color */
}
```

### Signup Card Background
Edit `assets/css/style.css` around line 318:
```css
.hero-signup-card {
    background: white; /* or any color */
}
```

## Background Image

### Current Setup
- **File**: `hero.jpg` (in root directory)
- **Recommended Size**: 2400px × 750px or larger
- **Format**: JPG, PNG, or WebP
- **File Size**: < 500KB optimized

### Change Background Image

#### Method 1: Replace the file
Replace `/hero.jpg` with your new image (keep the filename).

#### Method 2: Change the path
Edit `assets/css/style.css` around line 159:
```css
.hero {
    background-image: url('/your-new-image.jpg');
}
```

### Adjust Overlay Darkness
Edit `assets/css/style.css` around line 182:
```css
.hero::before {
    background: linear-gradient(135deg, 
        rgba(0, 0, 0, 0.7) 0%,    /* 70% dark */
        rgba(0, 0, 0, 0.5) 100%   /* 50% dark */
    );
}
```
- **Lighter**: Use 0.4 and 0.3
- **Darker**: Use 0.8 and 0.7

## Layout Customization

### Adjust Column Width Ratio
Edit `assets/css/style.css` around line 197:
```css
.hero-content-wrapper {
    grid-template-columns: 1fr 1fr;  /* Equal columns */
}
```

**Alternatives**:
- `1.2fr 1fr` - More space for text
- `1fr 1.2fr` - More space for form
- `2fr 1fr` - Much more text space

### Adjust Spacing Between Columns
Edit `assets/css/style.css` around line 198:
```css
gap: 4rem;  /* Change to 2rem, 3rem, 5rem, etc. */
```

### Change Signup Card Width
Edit `assets/css/style.css` around line 323:
```css
.hero-signup-card {
    max-width: 480px;  /* Adjust width */
}
```

## Form Customization

### Remove Google Sign-In Button
In `index.php`, delete or comment out lines 109-117:
```html
<!-- <button class="btn btn-google">...</button> -->
```

### Add More Form Fields
Add after the email input in `index.php`:
```html
<input type="text" class="signup-input" placeholder="Your name..." />
<input type="text" class="signup-input" placeholder="Company name..." />
```

### Change Button Icon/Arrow
Edit `index.php` line 108:
```html
<a href="/signup.php" class="btn btn-cta">Get started now →</a>
```
Change `→` to `✨`, `🚀`, or any emoji/symbol.

## Responsive Behavior

The layout automatically adapts:

### Desktop (> 968px)
- **Two-column layout**: Text left, form right
- **Gap**: 4rem between columns
- **Form**: Right-aligned, 480px max width

### Tablet (768px - 968px)
- **Stacked layout**: Text on top, form below
- **Form**: Centered, full width
- **Gap**: 3rem between sections

### Mobile (< 768px)
- **Single column**: Fully stacked
- **Smaller text**: Adjusted font sizes
- **Form**: Full width, centered
- **Gap**: 2.5rem

### Small Mobile (< 480px)
- **Compact spacing**: 2rem gap
- **Smaller bubble**: Reduced padding
- **Adjusted card**: 2rem padding

## Creating a Mosaic Background (Like Interior AI)

If you want the photo grid/mosaic effect:

### Option 1: Use a Pre-Made Mosaic Image
1. Create a collage of screenshots in Photoshop/Figma/Canva
2. Arrange in a grid pattern with slight perspective
3. Export as single image (2400px wide minimum)
4. Use as `hero.jpg`

### Option 2: CSS Grid with Multiple Images
This requires HTML changes to add multiple `<div>` elements with background images and CSS Grid styling. This is more complex but allows dynamic loading.

## Additional Tips

### Text Readability
- Ensure text has enough contrast with the background
- Use the dark overlay to improve readability
- Test with different background images
- Adjust text shadows if needed (line 285 in CSS)

### Performance
- Optimize images before uploading (use TinyPNG or similar)
- Keep hero image under 500KB
- Consider using WebP format for better compression
- Use lazy loading for below-the-fold images

### A/B Testing Ideas
Test different variations:
- Headline wording and emojis
- CTA button colors and text
- Chat bubble urgency messages
- Number of bullet points (2 vs 3 vs 4)
- Form placement (left vs right)

## Free Stock Photo Resources

- **Unsplash**: https://unsplash.com/
- **Pexels**: https://pexels.com/
- **Pixabay**: https://pixabay.com/

**Search terms**:
- "workspace overhead"
- "technology abstract"
- "team collaboration"
- "modern office"
- "digital background"
- "laptop workspace"

## Testing Checklist

After customization:
- [ ] Text is readable on background image
- [ ] Form works on mobile devices
- [ ] Colors match your brand
- [ ] Links work correctly
- [ ] Chat bubble text creates urgency
- [ ] CTA button stands out
- [ ] Google button (if used) is functional
- [ ] Responsive breakpoints look good
- [ ] Image loads quickly (< 2 seconds)
- [ ] All emojis render correctly

## Template Variables Reference

### Easy Customization Points
All main text can be customized in `index.php`:
- **Line 69**: Badge text
- **Line 82**: Main headline
- **Lines 89, 92, 95**: Three benefit bullets
- **Line 102**: Chat bubble text
- **Line 107**: Email placeholder
- **Line 108**: CTA button text
- **Line 116**: Google button text
- **Line 118**: Hint text

### Main Style Variables
Key CSS customization points in `style.css`:
- **Line 159**: Background image path
- **Line 182**: Overlay darkness
- **Line 197**: Column layout ratio
- **Line 198**: Column gap spacing
- **Line 332**: Chat bubble gradient
- **Line 394**: CTA button gradient

## Need Help?

If you encounter issues:
1. Clear browser cache (Cmd+Shift+R / Ctrl+Shift+R)
2. Check browser console for errors (F12)
3. Verify image paths are correct
4. Test in different browsers
5. Use browser dev tools to inspect elements

---

**Current Status**: Two-column layout with signup card implemented ✅

**Version**: 2.0 - Interior AI inspired design
