# Quick Reference - Homepage Updates

## What Changed? 🎨

Your homepage has been **completely redesigned** to match the Interior AI inspiration while remaining a flexible template.

### Before → After

#### Layout
- ❌ Single column, centered content
- ✅ **Two-column layout** (text left, signup form right)

#### Content Structure
- ❌ Paragraph subheading + user avatars + 5 benefit boxes + 2 buttons
- ✅ **3 bullet points + white signup card with form**

#### Visual Style
- ❌ Boxed benefits with backgrounds
- ✅ **Simple underlined text links + gradient CTA button**

---

## Quick Customization Guide

### 🎯 Top 5 Things to Customize

#### 1. **Your Product Name** (30 seconds)
File: `index.php` line 69
```html
<span class="badge-text">#1 SaaS Solution</span>
```
→ Change to: `#1 [Your Product Type]`

#### 2. **Your Headline** (30 seconds)
File: `index.php` line 82-84
```html
<h1 class="hero-title">
    🚀 Transform Your Business
</h1>
```
→ Change emoji and text to match your product

#### 3. **Your 3 Benefits** (2 minutes)
File: `index.php` lines 88-96
```html
<div class="benefit">
    ✅ <a href="/">Your benefit</a> with description
</div>
```
→ Write 3 compelling reasons to use your product

#### 4. **Your Chat Bubble** (30 seconds)
File: `index.php` line 102
```html
<div class="signup-bubble">
    ✨ Get your first results in less than a minute!
</div>
```
→ Add urgency about your product

#### 5. **Your CTA Button** (30 seconds)
File: `index.php` line 108
```html
<a href="/signup.php" class="btn btn-cta">Get started now →</a>
```
→ Change text to your call-to-action

---

## Color Customization

### Change Button Color (1 minute)
File: `assets/css/style.css` line 394

**Current**: Orange/coral gradient
```css
background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #f06595 100%);
```

**Popular alternatives**:
```css
/* Blue */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Green */
background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);

/* Purple */
background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
```

### Change Chat Bubble Color (1 minute)
File: `assets/css/style.css` line 332
```css
background: linear-gradient(135deg, #10b981 0%, #059669 100%);
```
→ Use your brand accent color

---

## Background Image

### Replace Hero Image (30 seconds)
1. Put your new image in the root folder
2. Name it `hero.jpg` (or update path in CSS line 159)
3. Recommended size: **2400px × 750px**
4. Keep file size under 500KB

### Adjust Darkness (30 seconds)
File: `assets/css/style.css` line 182
```css
rgba(0, 0, 0, 0.7)  ← Change 0.7 to make lighter/darker
```
- Lighter: 0.4 - 0.5
- Darker: 0.8 - 0.9

---

## Layout Adjustments

### More Space for Form
File: `assets/css/style.css` line 197
```css
grid-template-columns: 1fr 1fr;  /* Equal columns */
```
→ Change to: `1fr 1.3fr` (more space for form)

### More Space for Text
```css
grid-template-columns: 1.3fr 1fr;  /* More space for text */
```

### Adjust Spacing Between Columns
File: `assets/css/style.css` line 198
```css
gap: 4rem;  /* Current */
```
→ Try: `3rem` (closer) or `5rem` (wider)

---

## Optional: Remove Google Button

If you don't need Google sign-in:

File: `index.php` lines 109-117
```html
<!-- Comment out or delete this section -->
<!--
<button class="btn btn-google">
    ...Google button code...
</button>
-->
```

---

## File Map

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

## Responsive Preview

### Desktop (1920px)
```
┌────────────────────────────────────────┐
│  Badge                                 │
│  🚀 Big Headline          ┌─────────┐ │
│                           │ Bubble  │ │
│  ✅ Benefit 1             ├─────────┤ │
│  ✅ Benefit 2             │ Email   │ │
│  ✅ Benefit 3             │ Button  │ │
│                           │ Google  │ │
│                           └─────────┘ │
└────────────────────────────────────────┘
```

### Tablet (768px)
```
┌──────────────────┐
│  Badge           │
│  🚀 Headline     │
│  ✅ Benefit 1   │
│  ✅ Benefit 2   │
│  ✅ Benefit 3   │
│                  │
│  ┌────────────┐ │
│  │  Bubble    │ │
│  ├────────────┤ │
│  │  Email     │ │
│  │  Button    │ │
│  │  Google    │ │
│  └────────────┘ │
└──────────────────┘
```

### Mobile (375px)
```
┌─────────────┐
│  Badge      │
│  🚀 Headline│
│  ✅ Benefit │
│  ✅ Benefit │
│  ✅ Benefit │
│             │
│ ┌─────────┐│
│ │ Bubble  ││
│ ├─────────┤│
│ │ Email   ││
│ │ Button  ││
│ │ Google  ││
│ └─────────┘│
└─────────────┘
```

---

## Common Tasks

### Task: Change All Colors to Match Brand
**Time**: 5 minutes

1. CTA Button: Line 394 in `style.css`
2. Chat Bubble: Line 332 in `style.css`
3. Input Focus: Line 374 in `style.css` (optional)
4. Navigation: Line 147 in `style.css` (optional)

### Task: Replace All Text Content
**Time**: 5 minutes

1. Badge: Line 69 in `index.php`
2. Headline: Line 82 in `index.php`
3. Benefits (3): Lines 88-96 in `index.php`
4. Chat Bubble: Line 102 in `index.php`
5. Button Text: Line 108 in `index.php`

### Task: Swap Background Image
**Time**: 2 minutes

1. Resize your image to 2400×750px
2. Optimize it (TinyPNG.com)
3. Replace `hero.jpg` in root folder
4. Refresh browser (Cmd+Shift+R)

---

## Testing Checklist

Quick test before going live:
- [ ] Open in Chrome
- [ ] Open in Safari/Firefox
- [ ] Open on phone (scan QR or use dev tools)
- [ ] Click email input - does it focus?
- [ ] Click CTA button - does it go to signup page?
- [ ] Scroll - does parallax work?
- [ ] Read text - is it readable on your background?
- [ ] Resize browser - does it look good at all sizes?

---

## Get Help

### Documentation
- **Full details**: See `DESIGN_COMPARISON.md`
- **Customization guide**: See `HERO_CUSTOMIZATION.md`
- **This guide**: `QUICK_REFERENCE.md`

### Need to Revert?
If you want the old design back, use Git:
```bash
git checkout HEAD~1 index.php assets/css/style.css
```

---

## Summary

✅ **Layout**: Two-column design implemented  
✅ **Form**: White signup card with email + CTA  
✅ **Benefits**: 3 bullet points with underlined links  
✅ **Colors**: Modern gradient buttons  
✅ **Responsive**: Works on all devices  
✅ **Template**: All text easily customizable  

**Your next step**: Customize the 5 main text areas above! 🚀

---

**Version**: 2.0 - Interior AI Inspired  
**Last Updated**: October 6, 2025

