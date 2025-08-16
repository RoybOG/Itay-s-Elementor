console.log('fancy script here!!!')


  const padding = typeof ItayFancySVGSettings !== 'undefined' ? ItayFancySVGSettings.padding : 5;

  console.log(padding)
 // Ensure the DOM is fully loaded before running the script
  document.addEventListener('DOMContentLoaded', (event) => {
    const svgElements = document.querySelectorAll('.itay-fancySVG svg');

    svgElements.forEach((svgElement=>{
    if (svgElement) {
      try {
        svgElement.setAttribute("preserveAspectRatio", "none")
        svgElement.setAttribute("width", "100%");
        svgElement.setAttribute("height", "100%");
        // Get the bounding box of the entire SVG content
        // This will include all child elements (polygon, rect) and their transforms.
        const bbox = svgElement.getBBox();

        // Optional: Add some padding around the bounding box
        // This prevents the stroke from being cut off at the edges
        
        const viewBoxX = bbox.x - padding;
        const viewBoxY = bbox.y - padding;
        const viewBoxWidth = bbox.width + (2 * padding);
        const viewBoxHeight = bbox.height + (2 * padding);

        // Construct the viewBox string
        const viewBoxValue = `${viewBoxX} ${viewBoxY} ${viewBoxWidth} ${viewBoxHeight}`;

        // Set the viewBox attribute on the SVG element
        svgElement.setAttribute('viewBox', viewBoxValue);

        console.log(`Calculated viewBox for complex SVG: ${viewBoxValue}`);
      } catch (e) {
        console.error("Error calculating SVG bounding box:", e);
        // Fallback: Apply a safe default viewBox if getBBox fails
        // This value is manually chosen to fit the combined star and rotated rect.
        svgElement.setAttribute('viewBox', "0 0 250 250");
        console.log("Applied fallback viewBox due to error.");
      }
    } else {
      console.error("SVG element not found.");
    }

    }))
  });