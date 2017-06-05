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
        fill(1);
        rect(bx, by, bs, bs);

    }

    void onPress(TouchEvent touchEvent) {
       if (touchEvent.touches[0].offsetX > bx-bs && touchEvent.touches[0].offsetX < bx+bs 
        && touchEvent.touches[0].offsetY > by-bs && touchEvent.touches[0].offsetY < by+bs) {
       locked = true;


      if(locked) {
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
    }
      bdifx = touchEvent.touches[0].offsetX - bx;
      bdify = touchEvent.touches[0].offsetY - by;
    }

    void onDrag(TouchEvent touchEvent) {
      if(locked) {
        if(firstPress){
          startTime = millis();
          firstPress = false;
        }
        bx = touchEvent.touches[0].offsetX - bdifx;
        by = touchEvent.touches[0].offsetY - bdify;
      }

      dragging = true;
    }

    void onRelease(TouchEvent touchEvent) {
      if (mouseXX > bx-bs && mouseXX < bx+bs 
        && mouseYY > by-bs && mouseYY < by+bs) {

      if(firstPress){
          startTime = millis()
          firstPress = false;
        }
      }
      locked = false;
      dragging = false;
    }
}
