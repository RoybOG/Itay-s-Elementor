console.log("script installed!");
const fps = 100;
const rotationResolution = 500; //how many points on the circumrefrece would a point go to in its rotation?
const dAngle = (2 * Math.PI) / rotationResolution; //degrees

//const direction = -1;

const dSin = Math.sin(dAngle);
console.log(dSin);
const dCos = Math.cos(dAngle);
console.log(dCos);

function rotateOrbitWidget(orbitWidgetEL) {
  let animationID = null;

  let widgetDirection = 1;
  switch (orbitWidgetEL.getAttribute("rotation_animation")) {
    case "turnRight":
      widgetDirection = 1;
      break;
    case "turnLeft":
      widgetDirection = -1;
      break;
    default:
      return;
  }

  orbitWidgetEL.addEventListener("mouseleave", () => {
    // console.log("out " + animationID);
    if (!animationID) {
      animationID = requestAnimationFrame(rotateAll);
    }

    // console.log("now " + animationID);
  });
  orbitWidgetEL.addEventListener("mouseenter", () => {
    // console.log("in " + animationID);
    // if (animationID) {
    window.cancelAnimationFrame(animationID);
    animationID = null;
    // }

    // console.log("now " + animationID);
  });

  //let animationID = requestAnimationFrame(rotateAll);
  // console.log("start " + animationID);
  let lastTimestamp = 0;
  let positions = {};

  function rotateElement(i) {
    let orbitEl = orbitWidgetEL.querySelector(
      `img.orbiting[orbit_index="${i}"]`
    );
    if (!(i in positions)) {
      positions[i] = {
        x: Number(orbitEl.getAttribute("initialCos")) || 0,
        y: Number(orbitEl.getAttribute("initialSin")) || 0,
      };
    }

    let newX = dCos * positions[i].x - dSin * positions[i].y * widgetDirection;
    positions[i].y =
      dCos * positions[i].y + dSin * positions[i].x * widgetDirection;

    //let newX = -1 * positions[i].y;
    // positions[i].y = positions[i].x;
    positions[i].x = newX;
    // console.log(orbitEl.getAttribute("orbit_index"));
    orbitEl.style.left = `calc(50% - var(--orbitRadius) *${positions[i].x}`;
    orbitEl.style.top = `calc(50% - var(--orbitRadius) *${positions[i].y}`; //`translateX(-50%) translateX(${positions[0].x}px ) translateY(-50$) translateY(${positions[0].y}px) `;
  }

  function rotateAll(timestamp) {
    let deltaTime = timestamp - lastTimestamp;

    if (deltaTime > 1000 / fps) {
      for (
        let i = 0;
        i < orbitWidgetEL.querySelectorAll("img.orbiting").length;
        i++
      ) {
        rotateElement(i);
      }
      lastTimestamp = timestamp;
    }

    animationID = requestAnimationFrame(rotateAll);
    // console.log(animationID);
  }

  rotateAll();
}

function main() {
  const orbitWidgets = document.querySelectorAll(
    'div.circular-container[rotation_animation*="turn"]'
  );
  if (orbitWidgets.length == 0) {
    return;
  }

  for (let orbWidget of orbitWidgets) {
    rotateOrbitWidget(orbWidget);
  }
}

main();
