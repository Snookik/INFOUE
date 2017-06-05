class Box {
    float xpos = - 20;
    float ypos = - 20;
    float h;
    float w;
    float bs;
    float d;


    Box(float xpos, float ypos, float h, float w, float d) {
        while(this.xpos < 0 || this.xpos > width || this.ypos < 0 || this.ypos > height){
          float theta = random(0,360);
          float opposite = d * sin(radians(theta));
          float adjacent = d * cos(radians(theta));
          this.xpos = xpos + adjacent;
          this.ypos = ypos + opposite;
          this.h = h;
          this.w = w;
          this.d = d;
        }
    }

    void display() {
        rectMode(CENTER);
        fill(0,255,0);
        rect(xpos,ypos,w,h);
    }
}

class DragableBox {
    float bx = width / 2 - bs;
    float by = height / 2 - bs;
    float h;
    float w;

    DragableBox(float h, float w) {
        this.h = h;
        this.w = w;
    }

    void display() {
        rectMode(CENTER);
        fill(1);
        rect(bx,by,w,h);
    }

    void draw() {
       if (mouseX > bx-bs && mouseX < bx+bs && mouseY > by-bs && mouseY < by+bs) {
       bover = true;

            if(!locked) {
             stroke(255);
             fill(1);
            } else
              fill(1);
        } else {
         stroke(153);
         fill(153);
         bover = false;
       }



       rect(bx, by, bs, bs);
    }

    void onPress() {
      if(bover) {

        if (firstPress)
        {
          startX = this.bx;
          startY = this.by;
          startTime = millis();
          firstPress = false;
        }
        locked = true;
        fill(1);
      } else {
        locked = false;
      }
      bdifx = mouseX-bx;
      bdify = mouseY-by;
    }

    void onDrag() {
      if(locked) {
        bx = mouseX-bdifx;
        by = mouseY-bdify;
      }
    }

    void onRelease() {
      locked = false;
    }
}
