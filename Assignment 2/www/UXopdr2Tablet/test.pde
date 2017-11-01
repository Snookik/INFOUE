int bs = 50;
float bdifx = 0.0;
float bdify = 0.0;
DragableBox movableBox;
boolean bover = false;
boolean locked = false;
boolean success = false;
ArrayList rounds;
int index = 0;
boolean firstPress = true;
String[] table;
float startX;
float startY;
float startTime;
boolean endgame = false;
boolean dragging = false;
float mouseXX;
float mouseYY;
PFont font;

void setup()
{
  size(960, 1200);
  bx = width;
  by = height;
  rectMode(CENTER_RADIUS);
  rounds = new ArrayList();
  fillRounds();
  movableBox = new DragableBox(bs, bs);

  // init IO
  startX = width - bs;
  startY = height - bs;

  table = new String[rounds.size() + 1];
  table[0] = "startX;startY;endX;endY;time;success";

  font = loadFont("FFScala.ttf");
  textFont(font);

}

void draw()
{
  background(230);
  // Test if the cursor is over the box
  if(index >= rounds.size()){
    if(!endgame){
        String date = "" + day() + "-" + hour() + ":" + minute() + ":" + second();
        saveStrings(date, table);
        endgame = true;
    }
  }else{
    rounds.get(index).draw();
  }
  text(startTime - millis(), 15,60);
}

void touchStart(TouchEvent touchEvent){
    movableBox.onPress(touchEvent);
    mouseXX = touchEvent.touches[0].offsetX;
    mouseYY = touchEvent.touches[0].offsetY;

}

void touchMove(TouchEvent touchEvent){
    movableBox.onDrag(touchEvent);
      mouseXX = touchEvent.touches[0].offsetX;
      mouseYY = touchEvent.touches[0].offsetY;

}

void touchCancel(TouchEvent touchEvent) {
    movableBox.onRelease(touchEvent);
    rounds.get(index).fail(touchEvent);
    locked = false;
      mouseXX = touchEvent.touches[0].offsetX;
      mouseYY = touchEvent.touches[0].offsetY;

}

void touchEnd(TouchEvent touchEvent){
    movableBox.onRelease(touchEvent);
    rounds.get(index).fail(touchEvent);
    locked = false;
}

void fillRounds() {

  rounds.add(new Round(width/2 - 50, height/2 - 50, 100, 100, 300));

  for (int i = 0; i < 5; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 100, 100, 300));
  }

  for (int i = 5; i < 10; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 100, 100, 500));
  }

  for (int i = 10; i < 15; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 50, 50, 300));
  }

  for (int i = 15; i < 20; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 50, 50, 500));
  }
}
