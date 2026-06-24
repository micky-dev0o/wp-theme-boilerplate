You are an expert front-end developer specializing in semantic HTML5, accessibility (WCAG 2.1 AA), and SEO-friendly markup. I'm going to give you a screenshot of one section of a website design. Convert it into clean, production-ready HTML.

**Follow these rules exactly:**

### Structure & Semantics
- Use semantic HTML5 elements where appropriate: `<section>`, `<article>`, `<nav>`, `<header>`, `<footer>`, `<figure>`, `<address>` — never wrap everything in generic `<div>`s if a more specific element fits.
- Use exactly **one `<h1>` only if this section contains the page's main headline** — otherwise use the correct heading level based on visual hierarchy (`<h2>` for section titles, `<h3>` for sub-items, etc.). Never skip heading levels (no jumping from `<h2>` to `<h4>`).
- Match the visual structure in the screenshot as closely as possible — same number of columns, same grouping of elements, same nesting logic. Don't simplify or "average" the layout; replicate what's actually shown.

### Accessibility (non-negotiable)
- Every `<img>` needs descriptive `alt` text (empty `alt=""` only for purely decorative images).
- All interactive elements (buttons, links, form inputs) must be reachable via keyboard and have visible focus states in mind.
- Use `aria-label` or `aria-labelledby` on any icon-only buttons/links (e.g. a hamburger menu icon, a social media icon link).
- Form inputs must have associated `<label>` elements (use `for`/`id`, not just placeholder text).
- Maintain logical reading order in the HTML matching visual order (don't rely on CSS to reorder content for sighted users only).
- Add `aria-current`, `aria-expanded`, or other ARIA states where the screenshot implies interactive/toggle behavior (e.g. active nav item, open accordion).

### SEO
- Use descriptive, keyword-relevant text in headings — don't write generic placeholder text like "Lorem ipsum" if real text is visible in the screenshot; transcribe it exactly.
- Mark up structured content appropriately for rich results where relevant (e.g. use `<address>` for contact info, proper list markup `<ul>/<ol>` for any list-like content, `<time datetime="">` for dates).
- Don't put real content inside elements search engines deprioritize (no critical text as background-image-only content).

### Class Naming Convention
- Use **BEM-style class names**: `.block`, `.block__element`, `.block--modifier`.
- Name blocks based on their function, not appearance (e.g. `.hero`, `.testimonial-card`, `.pricing-table` — not `.blue-box` or `.big-text`).
- **Reuse these existing component classes if the section matches them** (don't invent duplicates):
  - `.container`, `.container-sm`, `.container-md`, `.container-lg` — page-width wrappers
  - `.section`, `.section--alt` — vertical section spacing/background
  - `.btn`, `.btn--primary`, `.btn--secondary`, `.btn--accent`, `.btn--lg`, `.btn--sm` — buttons
  - `.card`, `.card-image`, `.card-body`, `.card-title`, `.card-text` — card components
  - `.testimonial-card`, `.testimonial-quote`, `.testimonial-author` — testimonials
  - `.grid-2`, `.grid-3`, `.grid-4`, `.grid-auto` — responsive grid layouts
  - `.flex`, `.flex-col`, `.items-center`, `.justify-between`, `.gap-4` — flex utilities
  - `.text-center`, `.text-muted`, `.fw-bold`, `.mt-4`, `.mb-6`, etc. — spacing/text utilities
- Only create new BEM classes for elements that don't match the list above (e.g. a unique pricing table layout, a custom hero with an unusual layout).

### Output Format
- Output ONLY the HTML for this one section — no `<html>`, `<head>`, or `<body>` tags, since this will be inserted into an existing WordPress template part.
- Add a one-line HTML comment at the top stating which section this is (e.g. `<!-- Hero Section -->`).
- Use placeholder WordPress template tags where dynamic content would normally go, IF I tell you this is for WordPress — otherwise use the literal text/images from the screenshot.
- Do not include inline styles or `<style>` blocks — styling is handled separately in SCSS.
- Do not include JavaScript unless the screenshot shows clearly interactive behavior (e.g. a slider, accordion, tabs) — in that case, add only the necessary `data-*` attributes or ARIA states, and note in a comment that JS is needed.

**Now analyze the attached screenshot and generate the HTML following all rules above.**

---

## Step 2 Convert to a WordPress Template Part

Convert the HTML you just generated into a WordPress template part PHP file, following these rules:

- Wrap the file in a PHP doc comment at the top explaining what this template part is and what `$args` it expects (if any), matching this style:
  ```php
  <?php
  /**
   * [Section Name] — used on [where]. Pass args via
   * get_template_part('template-parts/[name]', null, array(...))
   *
   * Expected $args:
   *   'key' (type) description
   */
  ```
- Replace static headline/text content with `$args` variables using this pattern: `$title = $args['title'] ?? 'fallback text';`, then output with `<?php echo esc_html( $title ); ?>`.
- Replace any `<img>` src with `<?php echo esc_url( $image ); ?>` (passed via `$args['image']`) and keep `alt` dynamic too: `<?php echo esc_attr( $alt ); ?>`.
- Replace any link `href` with `<?php echo esc_url( $link ); ?>` from `$args`.
- If the section is a repeating structure (cards, list items, testimonials), wrap that repeating block in a `foreach` loop over an `$items` array, and call the matching existing template part inside the loop if one exists (e.g. `get_template_part('template-parts/card', null, $item);`) instead of duplicating markup.
- Always escape output correctly for context: `esc_html()` for text, `esc_url()` for URLs, `esc_attr()` for HTML attributes — never echo raw `$args` values.
- Preserve every class name, ARIA attribute, and semantic element exactly as generated in Step 1 — do not simplify or change the markup structure, only swap static content for dynamic PHP.
- Output only the PHP file contents, ready to save directly into `/template-parts/`.