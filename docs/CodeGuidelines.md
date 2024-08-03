# Code style guide

This project follows the [PSR-12][1] standard for PHP and guidelines established for the project. Below are the main aspects of PSR-12 that should be followed to ensure consistent and high-quality code.

## General rules

### Naming
- File names must be in PascalCase.
- Class names must be in PascalCase.
- Method names must be in camelCase.
- Variable names must be in camelCase.

### Control Structures
- There MUST be one space after the control structure keyword.
- There MUST NOT be a space after the opening parenthesis.
- There MUST NOT be a space before the closing parenthesis.
- There MUST be one space between the closing parenthesis and the opening brace.
- The structure body MUST be indented once.
- The body MUST be on the next line after the opening brace.
- The closing brace MUST be on the next line after the body.

### Methods and Functions
- Visibility MUST be declared on all methods.
- Method and function names MUST NOT be declared with space after the method name. The opening brace MUST go on its own line, and the closing brace MUST go on the next line following the body. There MUST NOT be a space after the opening parenthesis, and there MUST NOT be a space before the closing parenthesis.
- In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.
- Method and function arguments with default values MUST go at the end of the argument list.
- When present, the abstract and final declarations MUST precede the visibility declaration.
- When present, the static declaration MUST come after the visibility declaration.
- When making a method or function call, there MUST NOT be a space between the method or function name and the opening parenthesis, there MUST NOT be a space after the opening parenthesis, and there MUST NOT be a space before the closing parenthesis. In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.

### Files
- All PHP files MUST use the Unix LF (linefeed) line ending only.
- All PHP files MUST end with a non-blank line, terminated with a single LF.
- The closing ?> tag MUST be omitted from files containing only PHP.

### Lines
- There MUST NOT be a hard limit on line length.
- The soft limit on line length MUST be 120 characters.
- Lines SHOULD NOT be longer than 80 characters; lines longer than that SHOULD be split into multiple subsequent lines of no more than 80 characters each.
- There MUST NOT be trailing whitespace at the end of lines.
- Blank lines MAY be added to improve readability and to indicate related blocks of code except where explicitly forbidden.
- There MUST NOT be more than one statement per line.

### Indenting
- Code MUST use an indent of 4 spaces for each indent level, and MUST NOT use tabs for indenting.


## More rules
If you want to know more rules related to the standard, go to [PSR-12][1] documentation.

[1]: https://www.php-fig.org/psr/psr-12/