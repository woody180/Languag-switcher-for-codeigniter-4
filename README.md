# Setup language base
Files Structure
```
    .
    ├── ...
    ├── App                    
    |    ├── Commands          
    .    |      └── Lang.php      
         ├── Helpers                
         |      └── LanguageSwitcher_helper.php
         └── ...
```
For Cli manual visit [CLI Manual Page](./CLI_manual.md)
---
### Init languages
```
LanguageSwitcher::set([
    ['code' => 'en', 'name' => 'English', 'default' => 1],
    ['code' => 'de', 'name' => 'German', 'default' => 0]
]);
```

### Reset language base
```
// Reset language base
LanguageSwitcher::reset();
```

### Check active language
```
// Check active language
LanguageSwitcher::active();
```

### Switch languages
```
// Switch languages
LanguageSwitcher::switch('de');
```

### List all languages
```
// List all languages
LanguageSwitcher::list();
```

### Check if languages isset.
```
LanguageSwitcher::isset();
```


### Inline translation
```
LanguageSwitcher::translate([
    'en' => 'Read more...',
    'de' => 'Weiterlesen...'
]);
```


### Append new language.
Append new language with language code. If appended language is default then previous default language will be reset to 0

```
// List all languages
LanguageSwitcher::append([
    'code' => 'fr',
    'name' => 'french',
    'default' => 0 // If 1 then previous default language will be set to 0
]);
```
