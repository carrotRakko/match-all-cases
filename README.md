# match-all-cases
Generate PCRE pattern string which matches to several cases: camelCase, PascalCase, snake_case, kebab-case, CONSTANT_CASE and ampontancase.

# Install

```bash
# On macOS Catalina

# Move to the home directory
cd

# Clone this repository
git clone https://github.com/carrotRakko/match-all-cases.git

# Generate a symbolic link to the command
ln -s ~/match-all-cases/match-all-cases.php /usr/local/bin/match-all-cases

# Just use it!
match-all-cases el carousel item

# => (?:elcarouselitem)|(?:EL_CAROUSEL_ITEM)|(?:elCarouselItem)|(?:ElCarouselItem)|(?:el_carousel_item)|(?:el-carousel-item)
```
