int bs = 20;
float bdifx = 0.0;
float bdify = 0.0;
DragableBox movableBox;
boolean bover = false;
boolean locked = false;
boolean success = false;
ArrayList rounds;
int index = 0;
boolean firstPress = false;
String[] table;
float startX;
float startY;
float startTime;
boolean endgame = false;

void setup()
{
  size(1900, 1000);
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
}

void draw()
{
  background(0);
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
}

void mousePressed() {
  movableBox.onPress();
}

void touchStart(){
    movableBox.onPress();
}

void mouseDragged() {
  movableBox.onDrag();
}

void touchMove(){
    movableBox.onDrag();
}

void mouseReleased() {
  movableBox.onRelease();
  rounds.get(index).fail();
}

void touchEnd(){
    movableBox.onRelease();
    rounds.get(index).fail();
}

void fillRounds() {

  rounds.add(new Round(width/2 - 50, height/2 - 50, 100, 100, 150));

  for (int i = 0; i < 5; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 100, 100, 150));
  }

  for (int i = 5; i < 10; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 100, 100, 250));
  }

  for (int i = 10; i < 15; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 50, 50, 150));
  }

  for (int i = 15; i < 20; i++)
  {
    rounds.add(new Round(rounds.get(i).greenBox.xpos, rounds.get(i).greenBox.ypos, 50, 50, 250));
  }
}
