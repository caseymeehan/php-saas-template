# ⚠️ Important Security Note

## Google OAuth Credentials Exposed

### Issue
Your `config.local.php` file contains actual Google OAuth credentials that should never be committed to git.

### Good News
✅ `config.local.php` is already in `.gitignore` (line 38), so future commits won't include it.

### Action Required
If this repository has ever been committed to git with these credentials, you should:

1. **Remove the file from git tracking:**
   ```bash
   git rm --cached config.local.php
   git commit -m "Remove sensitive config from tracking"
   ```

2. **Rotate your Google OAuth credentials:**
   - Go to [Google Cloud Console](https://console.cloud.google.com/)
   - Navigate to "APIs & Services" > "Credentials"
   - Delete the old OAuth client
   - Create a new OAuth client with new credentials
   - Update your `config.local.php` with the new credentials

3. **Check if the repo is public:**
   - If this repo is on GitHub/GitLab/etc. as **public**, you MUST rotate credentials immediately
   - If it's **private**, rotating is still recommended as a best practice

### Prevention
The current setup is correct:
- `config.local.php` is gitignored ✅
- Sensitive credentials are separated from the main `config.php` ✅

Just ensure you never commit `config.local.php` to version control.

---

**This file can be deleted after you've addressed the issue.**

