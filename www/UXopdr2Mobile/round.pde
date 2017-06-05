class Round {

	Box greenBox;


	Round(float gx, float gy, float w, float h, float d) {
		movableBox = new DragableBox(bs, bs);
		if (rounds.size() < 1)
			greenBox = new Box(movableBox.bx, movableBox.by ,w,h,d);
		else
		   greenBox = new Box(rounds.get(rounds.size() - 1).greenBox.xpos, rounds.get(rounds.size() - 1).greenBox.ypos ,w,h,d);
	}

	void draw()
	{
		greenBox.display();
  		movableBox.draw();

		if (movableBox.bx > greenBox.xpos - greenBox.w / 2 && movableBox.bx < greenBox.xpos + greenBox.w / 2
			&& movableBox.by > greenBox.ypos - greenBox.h / 2 && movableBox.by < greenBox.ypos+greenBox.h / 2 && !dragging) {
			firstPress = true;
  			String row = "";
  			float time = millis() - startTime;

  			row = row + startX + ";";
  			row = row + startY + ";";
  			row = row + movableBox.bx + ";";
  			row = row + movableBox.by + ";";
  			row = row + time + ";";
  			row = row + "true";
  			table[index + 1] = row;
			index++;
		}
	}
	void fail(TouchEvent touchEvent){
			if ((movableBox.bx < greenBox.xpos - greenBox.w / 2 || movableBox.bx > greenBox.xpos + greenBox.w / 2
			|| movableBox.by < greenBox.ypos - greenBox.h / 2 || movableBox.by > greenBox.ypos+greenBox.h / 2)
				&& (mouseXX > movableBox.bx-bs && mouseXX < movableBox.bx+bs && mouseYY > movableBox.by-bs && mouseYY < movableBox.by+bs) && !dragging) {
				firstPress = true;
	  			String row = "";
	  			float time = millis() - startTime;

	  			row = row + startX + ";";
	  			row = row + startY + ";";
	  			row = row + movableBox.bx + ";";
	  			row = row + movableBox.by + ";";
	  			row = row + time + ";";
	  			row = row + "false";
	  			movableBox.bx = greenBox.xpos;
	  			movableBox.by = greenBox.ypos;
  				table[index + 1] = row;
				index++;
			}
	}
}
