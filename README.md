# ech-dynamic-whatsapp-link

## Usage
```
[dynamic_wtsapp_link selector=".float_wtsapp a" default_r="t200" default_link="https://xxxx" r="t575, t127" links="https://xxxx&text=(t575), https://xxxx&text=(t127)"]
```


## Shortcode attributes

Attribute | Description
----------|-------------
`selector` (String) | CSS selector (class/id)
`default_r` (String) | Default tcode
`default_link` (String) | Default tcode link
`r` (String) | tcode
`links` (String) | tcode links


Below attributes values must be corresponding to each other, otherwise no form will be generated:
1. r and links

All attributes are required.