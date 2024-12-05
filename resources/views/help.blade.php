<x-app-layout>
    <article class="prose">

        <h1 class="text-center font-serif">Markdown Guide</h1>

        <p>Markdown is a lightweight markup language with plain-text-formatting syntax. It is often used to format
            readme files, for writing messages in online discussion forums, and to create rich text using a plain text
            editor.</p>

        <h2>Cheat Sheet</h2>

        <p>Here are some basic Markdown syntax that you can use:</p>

        <table>
            <thead>
                <tr>
                    <th>Element</th>
                    <th>Markdown Syntax</th>
                </tr>
            </thead>
            <tbody class="font-mono">
                <tr>
                    <td>Heading</td>
                    <td># H1 <br> ## H2 <br> ### H3</td>
                </tr>
                <tr>
                    <td>Bold</td>
                    <td>**bold text**</td>
                </tr>
                <tr>
                    <td>Italic</td>
                    <td>*italicized text*</td>
                </tr>
                <tr>
                    <td>Blockquote</td>
                    <td>> blockquote</td>
                </tr>
                <tr>
                    <td>Ordered List</td>
                    <td>1. First item <br> 2. Second item <br> 3. Third item</td>
                </tr>
                <tr>
                    <td>Unordered List</td>
                    <td>- First item <br> - Second item <br> - Third item</td>
                </tr>
                <tr>
                    <td>Code</td>
                    <td>`code`</td>
                </tr>
                <tr>
                    <td>Horizontal Rule</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td>[title](https://www.example.com)</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>![alt text](image.jpg)</td>
                </tr>
            </tbody>
        </table>

        <h2>Markdown Preview</h2>

        <livewire:components.markdown-preview />

        <h2>Ready to Post?</h2>

        <p>Start writing your posts in Markdown format and share it with the community!</p>

        <a href="{{ route('posts.create') }}">
            <x-primary-button>New Post</x-primary-button>
        </a>

        <h2>More Information</h2>

        <p>For more information about Markdown, visit <a href="https://www.markdownguide.org/" target="_blank"
                rel="noreferrer noopener">this popular guide</a>.

    </article>
</x-app-layout>
