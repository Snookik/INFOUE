# INFOUE
[![GitHub issues](https://img.shields.io/github/issues/Snookik/INFOUE.svg)](https://github.com/Snookik/INFOUE/issues)
[![GitHub forks](https://img.shields.io/github/forks/Snookik/INFOUE.svg)](https://github.com/Snookik/INFOUE/network)
[![GitHub stars](https://img.shields.io/github/stars/Snookik/INFOUE.svg)](https://github.com/Snookik/INFOUE/stargazers)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/Snookik/INFOUE/master/LICENSE)

We took the "[[INFOUE] Usability Engineering & User Experience](http://www.cs.uu.nl/docs/vakken/ue/)" course at Utrecht University. Our research question was whether Fitts' Law could be accurately modeled using touch input data. The final report can be found in this repository and it essentially the Supplementary Online Material as it contains the source code for the software/applet that was used in the experiment. All statistical procedures are present in the final report. 

Lecturers:
* [dr.dr. E.L. van den Broek](http://www.human-centeredcomputing.com/)
* [dr. C. van Nimwegen](http://www.cs.uu.nl/staff/christof.html)

## Short Introduction on the topic
Fitts' Law is a model to predict the time required to rapidly move to a target area as a funtion of the 'distance to' and the 'size' of the target: 

![Equation](https://i.imgur.com/Wwj4hFE.png)

where T is the time to complete the task, 𝑅𝑇 is reaction time, 𝑀𝑇 is the average time taken to acquire the target, 𝐴 is the distance from the starting point to the center of the target, 𝑊 is the width of the target measured along the axis of motion and 𝑐 is a constant which is either 0, 0.5, or 1, depending on the specific environment. Note that the logarithmic function implies that a small increase in size or distance is much more effective for small targets than large targets.

𝑎 and 𝑏 can be approximated with linear regression using 𝑀𝑇 as the dependent variable and 𝐼𝐷 as the independent (criterion) variable, where 𝐼𝐷 = 𝑙𝑜𝑔2(2𝐴 / 𝑊 + 1)

## Acquiring W using R

To calculate if Fitts’ law still holds for the modern devices the test was carried out on, Shannon’s original formula (Shannon, C. E., & Weaver, W., 1949) was used:

![Equation2](https://i.imgur.com/ZDJ0bTa.png)

With 𝐼𝐷 = Index of Difficulty in bits, 𝐴 = Amplitude in inches and 𝑊 = width of target in inches. Shannon’s formula specifically was used because Fitts’ formulation of the law tends to fail for sufficiently small ID values (MacKenzie, I. S., 1989). As our first set of rounds has a large goal size with low distance.

To say that Fitts’ law still holds one would have to show that the relationship between the ID of a task and the time taken to accomplish the task is a linear one. Considering the nature of the tests, A is easily available as it was one of the key changing variables in the series of tasks. A simple R script is used to calculate W using the assumption of a straight drag from the black box to the green one. This assumption is made so that the computation of W in a 2D field can be reduced to a 1D problem, greatly reducing the problem in complexity. The script calculates the intersection points between the line formed by using the middle of the two boxes as anchor points and the green goal box, and then calculates the distance between those two intersection points.

![Acquiring W](https://i.imgur.com/8TATHxs.png)

```R
acquireW <- function(startX, startY, endX, endY, boxSize) {
  if(endX - startX == 0) { 
  return(NA) 
  }
  
  slope <- (endY - startY) / (endX - startX)
  
  if(!is.na(slope)) {
  
    b <- endY - (slope * endX)
    lowerBound <- endY - (boxSize/2)
    upperBound <- endY + (boxSize/2)
    leftBound <- endX - (boxSize/2)
    rightBound <- endX + (boxSize/2)
    rewritten <- 0 - (1/slope)
    
    if(slope != 0) {
      intersectionV1 <- solve(slope, lowerBound - b, tol = 1e-26)
      intersectionV2 <- solve(slope, upperBound - b, tol = 1e-26)
      intersectionH1 <- solve(rewritten, leftBound - b, tol = 1e-26)
      intersectionH2 <- solve(rewritten, rightBound - b, tol = 1e-26)
      intersections <- rbind(c(intersectionV1, lowerBound), c(intersectionV2, upperBound), c(intersectionH1, leftBound), c(intersectionH2,rightBound))
      df <- as.data.frame(intersections)
      filtersections <- subset(df, V1 > leftBound - 1 & V1 < rightBound + 1 & V2 < upperBound + 1 & V2 > lowerBound - 1)
      w <- sqrt((filtersections[2,1] - filtersections[1,1])^2 + (filtersections[2,2] – filtersections[1,2])^2)
      return(w)
    }  
    else {
      return(NA)
    }
  } 
  else {
    return
  }
}
```

## References

Shannon, C. E., & Weaver, W. (1949). The mathematical theory of communication. Urbana, IL: University of Illinois Press.
