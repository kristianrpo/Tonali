# Conventional commits
[Conventional Commit][1] is a naming standard for commit messages in Git. This standard defines a structured format for commit messages that helps to clearly and concisely understand what has been changed in the repository.

## Basic Concepts

### Types of commits
- **feat:** A new feature or functionality.
- **fix:** A bug fixed.
- **refactor:** A code change that neither corrects a bug nor adds a feature.
- **style:** Changes that do not affect the meaning of the code (blank spaces, formatting, missing semicolons, etc).
- **test:** Add missing tests or correct existing tests.
- **docs:** Changes in documentation.
- **reverts:** Reverts a previous commit.
- **build:** Changes that affect the compilation system or external dependencies (e.g. changes in composer.json).

### Write commits
- Is a mandatory part of the format.
- Use a type for the commit message.
- Use an scope for the commit message.
- Use the imperative, present tense: "change" not "changed" nor "changes" (think of This commit will... or This commit should...).
- Don't capitalize the first letter.
- No dot (.) at the end.

### Example

    docs(github): add pull request template and branch/commit naming guidelines

### Tools
There are tools that facilitate the creation of commits under the nomenclature established for the project, among them you can use "[Commitlint][2]", which allows to structure the commit message in a simple and fast way.

## More information
If you want to know other rules for creating commits or more types of commits, you can access to the "[Conventional commits][1]" page.


[1]: https://www.conventionalcommits.org/en/v1.0.0/ 
[2]: https://commitlint.io