#!/bin/bash
# 193有效的电话号码

grep -Eh "^\(?[0-9]{3}\)?[-| ][0-9]{3}-[0-9]{4}$" file.txt

# echo "987-123-4567" | grep -E "^\(?[0-9]{3}\)?[-| ][0-9]{3}-[0-9]{4}$"