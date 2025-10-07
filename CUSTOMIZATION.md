# Customization Guide

## Overview

Your homepage features a modern **two-column layout** with text content on the left and a signup card on the right. This guide will help you customize it to match your brand.

---

## 🎯 Quick Customizations (5 Minutes)

### 1. Badge Text (30 seconds)

**File**: `index.php` around line 69

```html
<span class="badge-text">#1 SaaS Solution</span>
```

**Change to**: `#1 [Your Product Type]` (e.g., "#1 AI Tool", "#1 Marketing App")

### 2. Main Headline (30 seconds)

**File**: `index.php` around line 82

```html
<h1 class="hero-title">
    🚀 Transform Your Business
</h1>
```

**Change**: Both the emoji and text to match your product

### 3. Three Benefit Bullets (2 minutes)

**File**: `index.php` lines 88-96

```html
<div class="benefit">
    ✅ <a href="/">Your benefit</a> with description
</div>
```

**Tips**:
- Keep it to 3 bullets for visual balance
- Use underlined links for key phrases
- Start with emojis for visual interest

### 4. Chat Bubble Urgency (30 seconds)

**File**: `index.php` around line 102

```html
<div class="signup-bubble">
    ✨ Get your first results in less than a minute!
</div>
```

**Change**: Add urgency specific to your product

### 5. CTA Button Text (30 seconds)

**File**: `index.php` around line 108

```html
<a href="/signup.php" class="btn btn-cta">Get started now →</a>
```

**Change**: Text and arrow emoji (try `✨`, `🚀`, or `→`)

---

## 🎨 Color Customization

### Primary CTA Button

**File**: `assets/css/style.css` around line 394

**Current**: Orange/coral gradient

```css
.btn-cta {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #f06595 100%);
}
```

**Popular Alternatives**:

```css
/* Blue */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Green */
background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);

/* Purple */
background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);

/* Orange */
background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
```

### Chat Bubble Color

**File**: `assets/css/style.css` around line 332

```css
.signup-bubble {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}
```

**Change**: To your brand accent color

### Signup Card Background

**File**: `assets/css/style.css` around line 318

```css
.hero-signup-card {
    background: white; /* or any color */
}
```

---

## 🖼️ Background Image

### Current Setup

- **File**: `hero.jpg` (in root directory)
- **Recommended Size**: 2400px × 750px or larger
- **Format**: JPG, PNG, or WebP
- **File Size**: < 500KB optimized

### Method 1: Replace the File (Easiest)

Replace `/hero.jpg` with your new image (keep the filename).

### Method 2: Change the Path

**File**: `assets/css/style.css` around line 159

```css
.hero {
    background-image: url('/your-new-image.jpg');
}
```

### Adjust Overlay Darkness

**File**: `assets/css/style.css` around line 182

```css
.hero::before {
    background: linear-gradient(135deg, 
        rgba(0, 0, 0, 0.7) 0%,    /* 70% dark */
        rgba(0, 0, 0, 0.5) 100%   /* 50% dark */
    );
}
```

- **Lighter**: Use 0.4 and 0.3
- **Darker**: Use 0.8 and 0.9

### Free Stock Photo Resources

- **Unsplash**: https://unsplash.com/
- **Pexels**: https://pexels.com/
- **Pixabay**: https://pixabay.com/

**Search Terms**: "workspace overhead", "technology abstract", "team collaboration", "modern office"

---

## 📐 Layout Adjustments

### Adjust Column Width Ratio

**File**: `assets/css/style.css` around line 197

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

**File**: `assets/css/style.css` around line 198

```css
gap: 4rem;  /* Current spacing */
```

**Try**: `2rem` (closer), `3rem`, or `5rem` (wider)

### Change Signup Card Width

**File**: `assets/css/style.css` around line 323

```css
.hero-signup-card {
    max-width: 480px;  /* Adjust width */
}
```

---

## 📝 Form Customization

### Remove Google Sign-In Button

**File**: `index.php` around lines 109-117

Comment out or delete:

```html
<!-- 
<button class="btn btn-google">
    ...Google button code...
</button>
-->
```

### Add More Form Fields

**File**: `index.php` - Add after the email input

```html
<input type="text" class="signup-input" placeholder="Your name..." />
<input type="text" class="signup-input" placeholder="Company name..." />
```

---

## 📱 Responsive Behavior

The layout automatically adapts:

### Desktop (> 968px)
- Two-column layout: Text left, form right
- Gap: 4rem between columns

### Tablet (768px - 968px)
- Stacked layout: Text on top, form below
- Form centered, full width

### Mobile (< 768px)
- Single column, fully stacked
- Smaller text, adjusted font sizes

---

## 🎨 Current Design Features

### Layout Structure
✅ Two-column grid layout (text left, form right)  
✅ Left-aligned content for better readability  
✅ White signup card with form elements  
✅ Green chat bubble for urgency messaging  
✅ Responsive design - stacks on mobile devices  
✅ Full-width background image with dark overlay  
✅ Modern gradient buttons  
✅ Google sign-in integration

### Visual Components
- **Headline**: Large, bold, left-aligned with emoji
- **Benefits**: 3 bullet points (clean text, no links)
- **Signup Card**: Email input + CTA button + Google button
- **Chat Bubble**: Green notification with urgency text

---

## 📋 Quick Reference Map

### Text Content to Customize (in index.php)
- **Line 69**: Badge text
- **Line 82**: Main headline
- **Lines 89, 92, 95**: Three benefit bullets
- **Line 102**: Chat bubble text
- **Line 107**: Email placeholder
- **Line 108**: CTA button text
- **Line 116**: Google button text (if used)
- **Line 118**: Hint text

### Key CSS Customization Points (in style.css)
- **Line 159**: Background image path
- **Line 182**: Overlay darkness
- **Line 197**: Column layout ratio
- **Line 198**: Column gap spacing
- **Line 332**: Chat bubble gradient
- **Line 394**: CTA button gradient

---

## 🧪 Testing Checklist

Before going live:

- [ ] Text is readable on background image
- [ ] Form works on mobile devices
- [ ] Colors match your brand
- [ ] Links work correctly
- [ ] Chat bubble text creates urgency
- [ ] CTA button stands out
- [ ] Responsive breakpoints look good
- [ ] Image loads quickly (< 2 seconds)
- [ ] Test in Chrome, Safari, Firefox
- [ ] Test on actual mobile device

---

## 📚 File Map

### What to Edit

| File | What It Controls | How Often to Edit |
|------|------------------|-------------------|
| `index.php` | Text content, HTML structure | Often |
| `assets/css/style.css` | Colors, layout, styling | Sometimes |
| `hero.jpg` | Background image | Once per redesign |

### What NOT to Edit

| File | Purpose | Don't Touch Unless... |
|------|---------|----------------------|
| `config.php` | Database config | You know PHP well |
| `database/` | Database files | You're adding features |
| `assets/js/main.js` | JavaScript | You need custom behavior |

---

## 💡 Performance Tips

- Optimize images before uploading (use TinyPNG or similar)
- Keep hero image under 500KB
- Consider using WebP format for better compression
- Use lazy loading for below-the-fold images

---

## 🔧 Common Tasks

### Task: Change All Colors to Match Brand (5 minutes)
1. CTA Button: Line 394 in `style.css`
2. Chat Bubble: Line 332 in `style.css`
3. Input Focus: Line 374 in `style.css` (optional)
4. Navigation: Line 147 in `style.css` (optional)

### Task: Replace All Text Content (5 minutes)
1. Badge: Line 69 in `index.php`
2. Headline: Line 82 in `index.php`
3. Benefits (3): Lines 88-96 in `index.php`
4. Chat Bubble: Line 102 in `index.php`
5. Button Text: Line 108 in `index.php`

### Task: Swap Background Image (2 minutes)
1. Resize your image to 2400×750px
2. Optimize it (TinyPNG.com)
3. Replace `hero.jpg` in root folder
4. Refresh browser (Cmd+Shift+R / Ctrl+Shift+R)

---

## 🆘 Need Help?

If you encounter issues:

1. Clear browser cache (Cmd+Shift+R / Ctrl+Shift+R)
2. Check browser console for errors (F12)
3. Verify image paths are correct
4. Test in different browsers
5. Use browser dev tools to inspect elements

---

**Version**: 2.0 - Modern Two-Column Design  
**Status**: Ready to customize ✅

Happy customizing! 🚀

