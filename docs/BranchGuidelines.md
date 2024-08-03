# Branch appointments
A correct nomenclature of the branches makes it easier to find them and to relate them to the user stories established in the corresponding backlog or to the task in general.

## Types of branches
In the same idea of the conventional commits, the naming of the branch will depend on the intentionality of the change in the code of the branch. 

- **feat:** A new feature or functionality.
- **fix:** A bug fixed.
- **refactor:** A code change that neither corrects a bug nor adds a feature.
- **style:** Changes that do not affect the meaning of the code (blank spaces, formatting, missing semicolons, etc).
- **test:** Add missing tests or correct existing tests.
- **docs:** Changes in documentation.
- **reverts:** Reverts a previous commit.
- **build:** Changes that affect the compilation system or external dependencies (e.g. changes in composer.json).

## Create branch

For the naming of the branches, the following structure is followed:

    git branch [type-of-branch]/[short-description]

## Example
    branch: feature/add-authentication
